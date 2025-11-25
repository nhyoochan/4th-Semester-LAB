#include<stdio.h> 
#include<stdlib.h> 
#define f(x) 1/(1+x*x)  
int main() 
{ 
float lower_limit, upper_limit,stepsize,inte=0,k; 
int i,subinterval; 
printf("Enter lower_limit, upper_limit, sub_interval"); 
scanf("%f %f %d",&lower_limit, &upper_limit,&subinterval); 
stepsize=(upper_limit-lower_limit)/subinterval; 
inte=f(lower_limit)+f(upper_limit); 
for(i=1;i<=(subinterval-1);i++) 
{
19 
k=lower_limit+i*stepsize; 
if(i%2==0) 
{ 
inte=inte+2*f(k); 
} 
else{ 
inte=inte+4*f(k); 
} 
} 
inte=inte*stepsize/3; 
printf("The required integration value: %f",inte); 
return 0; 
} 
