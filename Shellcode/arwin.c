#include <windows.h>
#include <stdio.h>

/***************************************
arwin - win32 address resolution program
by steve hanna v.01
   vividmachines.com
   shanna@uiuc.edu
you are free to modify this code
but please attribute me if you
change the code. bugfixes & additions
are welcome please email me!
to compile:
you will need a win32 compiler with
the win32 SDK

this program finds the absolute address
of a function in a specified DLL.
happy shellcoding!
***************************************/


int main(int argc, char** argv)
{
	HMODULE hmod_libname;
	FARPROC fprc_func;
	
	printf("arwin - win32 address resolution program - by steve hanna - v.01\n");
	if(argc < 3)
	{
		printf("%s <Library Name> <Function Name>\n",argv[0]);
		exit(-1);
	}

	hmod_libname = LoadLibrary(argv[1]);
	if(hmod_libname == NULL)
	{
		printf("Error: could not load library!\n");
		exit(-1);
	}
	fprc_func = GetProcAddress(hmod_libname,argv[2]);
	
	if(fprc_func == NULL)
	{
		printf("Error: could find the function in the library!\n");
		exit(-1);
	}
	printf("%s is located at 0x%08x in %s\n",argv[2],(unsigned int)fprc_func,argv[1]);


}
