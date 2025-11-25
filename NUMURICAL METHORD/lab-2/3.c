#include<stdio.h>
#include<math.h>
#include<stdlib.h>

#define f(x) 3*x-cos(x)-1
#define g(x) 3+sin(x) //derivative of f(x)

int main(){
    float err,x0,g0,f0,x1,f1;
    int n, step=1;
        printf("\n Enter the initial guess:");
        scanf("%f",&x0);
        
        printf("\n Enter the tolerable error:");
        scanf("%f",&err);

        printf("\n Enter the maximum iteration number:");
        scanf("%d",&n);
    do{
        g0=g(x0);
        f0=f(x0);
    
    if(g0==0){
        printf("\n Mathematical Error!");
        exit(0);
    }
    
    x1=x0-f0/g0;
    f1=f(x1);
    x0=x1;
    step=step+1;

    if(step>n){
        printf("\n Not Convergent!");
        exit(0);
    }
    }while(fabs(f1)>err);
        printf("\n The required root is : %f ",x1);
        return 0;
}