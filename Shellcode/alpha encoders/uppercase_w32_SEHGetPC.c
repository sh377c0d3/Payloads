void OriginalSEH(void) {
  __asm__("
  # SEH: 0x59 0x5c 0x59 0x59 0x59 0x59 0x41 0x41 0x51 0x51 0xc3
	  inc     %esp
	  inc     %esp
	  inc     %esp
	  inc     %esp
	  aaa
	  aaa
	  aaa
	  pop     %esp				# < esp -> SEH info struct
	  inc     %esp
	  inc     %esp
	  inc     %esp
	  inc     %esp
	  inc     %esp
	  inc     %esp
	  inc     %esp
	  inc     %esp
	  inc     %esp
	  inc     %esp
	  inc     %esp
	  inc     %esp
	  pop	    %ecx				# eax = exception address
	  inc	    %ecx				# skip bad instruction.
	  inc	    %ecx				#
	  push    %ecx				# > baseaddress
	  iret

	  .byte 0x0
  ");
}



/*
0x5141104a
0x8b5a5axx
of
0x52421052
0x8b5a5axx
of
0x52421051
0x8b5959xx
of
0x51411051
0x8b5959xx
*/
void Win32SEHGetPC(void) {
  __asm__("
  # Push SEH code onto the stack
  # SEH code: 59 5c 59 59 59 59 41 41 51 51 c3 (see above)
    push    %esi                # %esi = 0
    push    %esp
    pop     %eax
    xor     %ss:(%eax), %esi

    push    %edi                # %edi = 0
    push    %esp
    pop     %eax
    xor     %ss:(%eax), %edi

    push    %esi
    pop     %eax                # %al = 0
    dec     %eax                # %al = 0xff
    xor     $0x39, %al          # %al = 0xff^0c39 = 0xc6
    dec     %eax
    dec     %eax
    dec     %eax                # %eal = 0xc3
    push    %eax                # > 0xc3 (build new SEH on stack)

    push    %esi                # %eax = 0
    pop     %eax
    xor     $0x51514141, %eax
    push    %eax                # > 0x51 0x51 0x41 0x41 (build new SEH on stack)

    push    %esi                # %eax = 0
    pop     %eax
    xor     $0x59595959, %eax
    push    %eax                # > 0x59 0x59 0x59 0x59

    xor     $0x44595959, %eax   # %eax = 0x1d000000
    xor     $0x41594b4b, %eax   # %eax = 0x5c594b4b
    push    %eax                # > 0x4b 0x4b 0x59 0x5c (build new SEH on stack)
    # the 0x4b's are dummy dec %ecx's

    push    %esp                # edi = new SEH
    push    %esp
    pop     %eax
    xor     %ss:(%eax), %edi    
    
  # Hook onto the last SEH frame which can be found on the stack.
  # Unless the thread use more then 65535 bytes of stack atm, the SEH frame
  # can be found at (esp & 0xffff0000)+0xffe4. I mean to say in the last few
  # bytes at the top of the stack.
    # let's assume esp = 0x12345678
    push    %esp                # esp -> 0x78 0x56 0x34 0x12
    inc     %esp
    inc     %esp                # esp -> 0x34 0x12
    dec     %esi
    push    %esi                # esp -> 0xff 0xff 0xff 0xff 0x34 0x12
    inc     %esp
    inc     %esp                # esp -> 0xff 0xff 0x22 0x11
    pop     %eax                # eax = 0x1122ffff
    xor     $0xe4^0xff^0x41, %al # eax = 0x1122ffe4
    xor     $0x41, %al

    xor     %ss:(%eax), %edi    # edi = old SEH^new SEH
    xor     %edi, %ss:(%eax)    # current SEH = new SEH

  # Cause an exception
    xor     %dh, (%esi)        # %esi -> -1 (There is no memory at -1: this invokes the SEH)

    .byte 0x0
  ");
}

int main (int argc, char** argv) {
  char* strWin32SEHGetPC = (char*)OriginalSEH+3;
  printf("%s", strWin32SEHGetPC);
  return 0;
}