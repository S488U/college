#include <stdio.h>
#include <conio.h>
void main()
{
    int a,b,x,y,t,gcd,lcm;
    printf("enter 2 numbers");
    scanf("%d%d",&x,&y);
    a=x;
    b=y;
    while (b !=0)
    {
       t= b;
       b= a%b;
       a= t;
    }
    gcd = a;
    lcm = (x*y)/gcd;
    printf("Greatest common divisor of %d and %d is % d\n",x,y,gcd);
    printf("Least common multiple of %d and %d is %d",x,y,lcm);


    
}
