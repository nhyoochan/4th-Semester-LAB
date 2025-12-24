import java.util.Scanner;

class Process {
	int processID;
	int burstTime;
	int priority;
	int waitingTime;
	int turnaroundTime;

	public Process(int processID, int burstTime, int priority) {
		this.processID = processID;
		this.burstTime = burstTime;
		this.priority = priority;
	}
}

public class Priority {
	public static void main(String[] args) {
		Scanner scanner = new Scanner(System.in);
		System.out.print("Enter the number of processes: ");
		
		int n = scanner.nextInt();
		
		Process[] processes = new Process[n];

		for (int i = 0; i < n; i++) {
			System.out.print("Enter burst time for process " + (i + 1) + ": ");
			int burstTime = scanner.nextInt();
			System.out.print("Enter priority for process " + (i + 1) + ": ");
			int priority = scanner.nextInt();
			processes[i] = new Process(i + 1, burstTime, priority);
		}

		// Sort processes based on priority (lower number means higher priority)
		for (int i = 0; i < n - 1; i++) {
			for (int j = 0; j < n - 1 - i; j++) {
				if (processes[j].priority > processes[j + 1].priority) {
					Process temp = processes[j];
					processes[j] = processes[j + 1];
					processes[j + 1] = temp;
				}
			}
		}

  

		// Calculate waiting time and turnaround time
		int totalWaitingTime = 0, totalTurnaroundTime = 0;
		processes[0].waitingTime = 0;
		processes[0].turnaroundTime = processes[0].burstTime;
	
		for (int i = 1; i < n; i++) {
			processes[i].waitingTime = processes[i - 1].waitingTime + processes[i - 1].burstTime;
			processes[i].turnaroundTime = processes[i].waitingTime + processes[i].burstTime;
		}

		System.out.println("\nProcess ID\tBurst Time\tPriority\tWaiting Time\tTurnaround Time");
		for (Process process : processes) {
			totalWaitingTime += process.waitingTime;
			totalTurnaroundTime += process.turnaroundTime;
			System.out.printf("%-10d\t%-10d\t%-10d\t%-10d\t%-10d\n",
			process.processID, process.burstTime, process.priority, process.waitingTime, process.turnaroundTime);
		}

		System.out.printf("\nAverage Waiting Time: %.2f\n", (float) totalWaitingTime / n);
		System.out.printf("Average Turnaround Time: %.2f\n", (float) totalTurnaroundTime / n);
	}
}