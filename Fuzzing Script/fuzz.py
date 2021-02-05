filename = "test.txt"

fuzzString = "A" * 500

file = open(filename,'w')

file.write(fuzzString)

file.close()
