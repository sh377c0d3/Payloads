// pefinder by scriptjunkie
// simple utility to detect DEP/ASLR status of binaries

// Note: If a process manually enables DEP, but the NX_COMPAT flag is not in the header, it will be displayed as DEP not enabled, but that won't really be true.

#define WIN32_LEAN_AND_MEAN
#include <Windows.h>
#include <stdio.h>
char* targetName;
bool verbose;

int error(const char* message){
	if(verbose)
		printf(":( %s %s\n",targetName,message);
	return 1;
}

int checkTarget(bool verbose){
	//GET FILE
	HANDLE h = CreateFileA(targetName,GENERIC_READ,FILE_SHARE_READ,0,OPEN_EXISTING,FILE_ATTRIBUTE_NORMAL,NULL);
	if(h==INVALID_HANDLE_VALUE)
		return error("Cannot open file.");
	BYTE headers[1000];
	DWORD read;
	ReadFile(h,headers,1000,&read,NULL);

	//PARSE DOS AND NT HEADERS
	IMAGE_DOS_HEADER* idh = (IMAGE_DOS_HEADER*)headers;
	if(read<sizeof(IMAGE_DOS_HEADER))
		return error("Invalid DOS header");//invalid header
	IMAGE_NT_HEADERS* inh =(IMAGE_NT_HEADERS*)(headers+idh->e_lfanew);
	if(read < idh->e_lfanew + sizeof(IMAGE_NT_HEADERS))
		return error("Invalid NT header");//invalid header
	if(inh->Signature!=0x00004550)
		return error("Invalid NT header");//invalid header

	BOOL aslr = inh->OptionalHeader.DllCharacteristics & IMAGE_DLLCHARACTERISTICS_DYNAMIC_BASE;
	BOOL dep = inh->OptionalHeader.DllCharacteristics & IMAGE_DLLCHARACTERISTICS_NX_COMPAT;

	if(verbose || !aslr || !dep)
		printf("%s ",targetName);
	if(aslr){
		if(verbose)
			printf("ASLR enabled ");
	}else{
		printf("ASLR not enabled! ");
	}
	if(dep){
		if(verbose)
			printf("DEP enabled");
	}else{
		printf("DEP not enabled!");
	}
	if(verbose || !aslr || !dep)
		printf("\n");
	return 0;
}

int main(int argc, char**argv){
	targetName = "";
	if(argc < 2)
		return error("Must provide a filename!\nUsage: pefinder questionable.exe [-v]\nor pefinder - [-v]  to read a list of files from stdin");
	targetName = argv[1];
	verbose = argc > 2 && strcmp(argv[2],"-v") == 0;
	//filename mode
	if(strcmp(targetName,"-")!=0)
		return checkTarget(verbose);
	//list mode
	char line[MAX_PATH*2];
	targetName = line;
	while(gets_s(line) != NULL)
		checkTarget(verbose);
	return 0;
}
