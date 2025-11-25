#include<stdio.h>

int main(){ 
    int i,n; 
    float x[10],y[10],a,b,sumx=0,sumx2=0,sumy=0,sumxy=0; 
        printf("Enter the total number of data point:"); 
        scanf("%d",&n);     
    for(i=1;i<=n;i++){ 
        printf("Enter x[%d] and y[%d]",i,i); 
        scanf("%f%f",&x[i],&y[i]); 
    }
    
    for(i=1;i<=n;i++) { 
        sumx=sumx+x[i]; 
        sumx2=sumx2+x[i]*x[i]; 
        sumy=sumy+y[i]; 
        sumxy=sumxy+x[i]*y[i]; 
    } 
        b=(n*sumxy-sumx*sumy)/(n*sumx2-sumx*sumx);
        a=(sumy-b*sumx)/n;
            printf("The required coefficient a and b are:%f\t%f",a,b); 
            return 0; 
} 
