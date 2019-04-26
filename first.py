# a1 b2 c3 d4 e5 f6 g7 h8 i9 j10 k11 l12 m13 n14 o15 p16 q17 r18 s19 t20 u21 v22 w23 x24 y25 z26
import re
def main():
    print("Welcome! It's a simple program to calculate the numerical value of the word you entered.")
    a = 0 # to claculate the sum of each digit
    b = input("Enter the word: ")
    print("When you add all the character by thier numerical value of", b)
    b = b.replace(" ","") # removes all the whitespaces
    b = re.sub(r'\W+', '', b) # removes all characters except alpha-numeric values
    b = b.lower()
    for i in b:
        a += ord(i) - 96 # "ord" gives ascii code of character, "96" to convert from ascii to normal digit
    print("You get: ", a)

if __name__ == '__main__':
    main()