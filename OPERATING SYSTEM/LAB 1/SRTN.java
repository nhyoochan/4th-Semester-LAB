import java.util.Scanner;

class Process {
	int pid;
	int bt;
	int at;
	int rt;
	int wt;
	int tat;
	
	Process(int pid, int at, int bt) {
		this.pid = pid;
		this.bt = bt;
		this.at = at;
		this.wt = 0;
	}
}

class SRTN {
	public static void main(String[] args) {
	System.out.println("Enter the number of processes: ");
	Scanner scanner = new Scanner(System.in);
	
	int n = scanner.nextInt();
	Process[] processes = new Process[n];
	
	// initialize processes
	for (int i = 0; i < n; i++) {
		processes[i] = new Process(i+1, 0, 0);
		processes[i].pid = i + 1;
	}
	
	// input burst time and arrival time
	System.out.println("Enter the burst time for each process:");
	
	for (int i = 0; i < n; i++) {
		System.out.print("P" + (i + 1) + " Burst Time: ");
		processes[i].bt = scanner.nextInt();
		processes[i].rt = processes[i].bt;
	
	}
	
	System.out.println("Enter the arrival time for each process:");
	for (int i = 0; i < n; i++) {
		System.out.print("P" + (i + 1) + " Arrival Time: ");
		processes[i].at = scanner.nextInt();
	}
	
	int complete = 0, t = 0, minm = Integer.MAX_VALUE;
	Process shortest = null;
	boolean check = false;
	int totalWT = 0, totalTAT = 0;
	
	while (complete != n) {
		for (int j = 0; j < n; j++) {
			if ((processes[j].at <= t) && (processes[j].rt < minm) && processes[j].rt > 0) {
				minm = processes[j].rt;
				shortest = processes[j];
				check = true;
			}
		}
	
		if (!check) {
			t++;
			continue;
		}
	
		shortest.rt--;
		minm = shortest.rt;
		if (minm == 0) {
			minm = Integer.MAX_VALUE;
		}
	
		if (shortest.rt == 0) {
			complete++;
			check = false;
			int finish_time = t + 1;
			shortest.wt = finish_time - shortest.bt - shortest.at;
		
			if (shortest.wt < 0) {
				shortest.wt = 0;
			}
				shortest.tat = shortest.bt + shortest.wt;
				totalWT += shortest.wt;
				totalTAT += shortest.tat;
			}
			t++;
		}
	
		System.out.printf("| %-8s | %-12s | %-10s | %-12s | %-16s |\n", "Process", "Arrival Time",
		
		"Burst Time", "Waiting Time", "Turnaround Time");
		for (Process p : processes) {
			System.out.printf("| %-8d | %-12d | %-10d | %-12d | %-16d |\n", p.pid, p.at, p.bt, p.wt, p.tat);
		}
	
		System.out.printf("Average waiting time = %.2f\n", (float) totalWT / n);
		System.out.printf("Average turnaround time = %.2f\n", (float) totalTAT / n);
		scanner.close();
	}

}