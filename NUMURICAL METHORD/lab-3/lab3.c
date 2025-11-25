//IMPLEMENTATION OF LAGRANGE INTERPOLATION METHOD

#include<stdio.h>

int main(){
    int n, i, j;
    float xp,yp,p,x[10],y[10];
        printf("Enter the total number of data point:- \n"); 
        scanf("%d",&n);
    for(i=1;i<=n;i++){
        printf("\n Enter the value of x[%d] and y[%d]",i,i); 
        scanf("%f%f",&x[i],&y[i]);
    }
        printf("\n Enter the interpolating point:");
        scanf("%f",&xp);
        yp=0;
        
    for(i=1;i<=n;i++){
        p=1;
        for(j=1;j<=n;j++){
            if(i!=j){
                p=p*(xp-x[j])/(x[i]-x[j]);
            }
        }
        yp=yp+p*y[i];
    }
    printf("\n The interpolation value is :%f",yp); 
    return 0;
}