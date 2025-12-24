import java.text.ParseException;

class SCFS {
	static void findWaitingTime(int processes[], int n, int bt[], int at[], int wt[]) {
		int service_time[] = new int[n];
		service_time[0] = at[0];
		wt[0] = 0;
		
		for (int i = 1; i < n; i++) {
			service_time[i] = service_time[i-1] + bt[i-1];
			wt[i] = service_time[i] - at[i];
			
			if (wt[i] < 0) {
				wt[i] = 0;
			}
		}
	}
	
	static void findTurnAroundTime(int processes[], int n, int bt[], int wt[], int tat[]) {
		for (int i = 0; i < n; i++) {
			tat[i] = bt[i] + wt[i];
		}
	}
	
	static void findAvgTime(int processes[], int n, int bt[], int at[]) {
		int wt[] = new int[n], tat[] = new int[n];
		int total_wt = 0, total_tat = 0;
		
		findWaitingTime(processes, n, bt, at, wt);
		findTurnAroundTime(processes, n, bt, wt, tat);
		
		System.out.println("--------------------------------------------------------------------------");
		System.out.printf("| %-8s | %-12s | %-10s | %-12s | %-16s |\n", "Process", "Arrival Time", "Burst Time", "Waiting Time", "Turnaround Time");
	
		for (int i = 0; i < n; i++) {
			total_wt += wt[i];
			total_tat += tat[i];
			System.out.printf("| %-8d | %-12d | %-10d | %-12d | %-16d |\n", processes[i], at[i], bt[i], wt[i], tat[i]);
		}
		
		System.out.println("--------------------------------------------------------------------------");
		float avg_wt = (float) total_wt / n;
		float avg_tat = (float) total_tat / n;
		
		System.out.printf("Average waiting time = %.2f\n", avg_wt);
		System.out.printf("Total waiting time = %d\n", total_wt);
		System.out.printf("Average turnaround time = %.2f\n", avg_tat);
		System.out.printf("Total turnaround time = %d\n", total_tat);
	}
	
	public static void main(String[] args) throws ParseException {
		int processes[] = {1, 2, 3, 4};
		int n = processes.length;
		int burst_time[] = {21, 3, 6, 2};
		int arrival_time[] = {0, 2, 2, 3};
		findAvgTime(processes, n, burst_time, arrival_time);
	}
}