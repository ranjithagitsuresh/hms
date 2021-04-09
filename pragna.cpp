#include<iostream>
using namespace std;

int main(){
	int t;
	cin>>t;
	while(t--){
		int n,x;
		cin>>n>>x;
		int arr[n];
		for(int j=0;j<n;j++){
			cin>>arr[j];
		}
		int i=0;
		for(int k=x;k>0 && i<n-1;k--){
			int flag=0;
			p=log(arr[i])/log2;
			r=pow(p,2);
			a[i]=a[i]^r;
			for(int l=i+1;l<n;l++){
				if(arr[l]^r<arr[l]){
					arr[l]=arr[l]^r;
					flag=1;
					break;
				}
			}
			if(flag==0){
				a[n-1]=a[n-1]^r;
			}
			while(a[i]<=0){
				i+=1
			}
			z=k+1;
			if(z>0){
				if(n<3 and z/2 >0){
					a[n-1]=a[n-1]^1;
					a[n-2]=a[n-2]^1;
				}
			}
		}
		for(int y=0;y<n;y++){
			cout<<arr[y]<<" "
		}

	}
}