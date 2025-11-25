#include<stdio.h> 
#include<math.h> 
#define f(x) 1/(1+x*x)

int main(){ 
    float lower,upper,h,k,integration=0; 
    int i,n; 
        printf("\n Enter the lower limit"); 
        scanf("%f",&lower); 
        
        printf("\n Enter the upper limit"); 
        scanf("%f",&upper); 
        
        printf("\n Enter the subinterval");
        scanf("%d",&n); 
        
        h=(upper-lower)/n; 
        integration=f(lower)+f(upper); 
        for(i=1;i<=n-1;i++){
            k=lower+i*h; 
            
        if(i%3==0){
            integration=integration+2*f(k); 
        }else{
            integration = integration+3*f(k); 
        }
    }
    integration=integration*3*h/8; 
        printf("The integration value is : %f",integration); 
        return 0; 
} 
