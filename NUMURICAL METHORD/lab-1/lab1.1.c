//ROOT FINDING USING BSECTION METHOD AND FALSE POSITION METHOD

#include<stdio.h>
#include<math.h>

#define f(x) pow(x,3)+3*x-5

int main() {
    float err,x1,x2,x0,f1,f2,f0; 
        printf("Enter the tolerable error:-"); 
        scanf("%f",&err); 
up:
    printf("\n Enter initial guess:"); 
    scanf("%f%f",&x1,&x2); 
       f1=f(x1); 
       f2=f(x2);  
if(f1*f2>0){ 
    printf("\n Initial guess are incorrect!"); 
    goto up;
} 

do { 
        x0=(x1+x2)/2; 
        f0=f(x0); 
    if(f1*f0<0){
        x2=x0; 
        f2=f0; 
} else{
    x1=x0; 
    f1=f0; 
} 

}while(fabs(f0)>err); 
    printf("\n The required root is : %f",x0); 
    return 0; 
} 