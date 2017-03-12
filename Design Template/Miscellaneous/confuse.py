import string
import random

a = string.ascii_lowercase
a = a.replace('l', '')

def listify(arr):
	for i in range(len(arr)):
		arr[i] = list(arr[i])
	return arr

def write_back(arr):
	f = open('final.txt', 'w')
	f.truncate()
	for i in range(len(arr)):
		arr[i] = ''.join(arr[i])
	f.write(''.join(arr))

f = open('test.txt', 'r')

# for i in range(100000):
#     f.write(''.join(random.sample(a,1)))
#     if i%200 == 0:
#         f.write('\n')

arr = f.readlines()
arr = listify(arr)
# print(arr[0])
# for i in range(len(arr)):
# 	print(len(arr[i]))

# print(len(f.readlines()))

# ENTER ALL THE EDITS HERE

arr[50][50] = 'l'
arr[50][51] = 'l'

arr[51][50] = 'l'
arr[51][51] = 'l'

arr[52][50] = 'l'
arr[52][51] = 'l'

arr[53][50] = 'l'
arr[53][51] = 'l'

arr[54][50] = 'l'
arr[54][51] = 'l'

arr[55][50] = 'l'
arr[55][51] = 'l'

arr[56][50] = 'l'
arr[56][51] = 'l'




write_back(arr)

f.close()