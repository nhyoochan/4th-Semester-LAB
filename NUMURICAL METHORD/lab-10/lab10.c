//IMPLEMENTATION OF RUNGE KUTTA(RK-4) FOR SOLVING ORDINARY DIFFERENTIAL EQUATIONS

#include<stdio.h>
#define f(x,y) ((y*y-x*x)/(y*y+x*x))
int main(){
float x0,y0,xn,h,yn,m1,m2,m3,m4,m;
int i,n;

printf("\n Enter initial conditions x0,y0");
scanf("%f%f",&x0,&y0);
printf("\n Enter the calculating point:");
scanf("%f",&xn);
printf("\n Enter the number of steps:");
scanf("%d",&n);

h=(xn-x0)/n;

for(i=0;i<n;i++)
{
m1=f(x0,y0);
m2=f((x0+h/2),(y0+(m1*h/2)));

m3=f((x0+h/2),(y0+(m2*h/2)));
m4=f((x0+h),(y0+(m3*h)));
m=(m1+2*m2+2*m3+m4)/6;
yn=y0+m*h;
x0=x0+h;
y0=yn;

}
printf("The required value is: %f",yn);
return 0;
}
