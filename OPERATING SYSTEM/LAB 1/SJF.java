import java.util.Arrays;
import java.util.Scanner;

// Process class to store ID and burst time
class Process {
	int id;
	int burstTime;

	Process(int id, int burstTime) {
		this.id = id;
		this.burstTime = burstTime;
	}
}

public class SJF {
	public static void main(String[] args) {
	Scanner scanner = new Scanner(System.in);

	// Step 1: Read number of processes
	System.out.print("Enter the number of processes: ");
	int n = scanner.nextInt();

	// Step 2: Read burst times and assign process IDs
	Process[] processes = new Process[n];
	for (int i = 0; i < n; i++) {
		System.out.print("Enter burst time for P" + (i + 1) + ": ");
		int bt = scanner.nextInt();
		processes[i] = new Process(i + 1, bt);
	}

	// Step 3: Sort processes by burst time (Shortest Job First)
	Arrays.sort(processes, (a, b) -> a.burstTime - b.burstTime);

	// Step 4: Calculate waiting time and turnaround time
	int[] wt = new int[n]; // Waiting times
	int[] tat = new int[n]; // Turnaround times

	wt[0] = 0; // First process has 0 waiting time
	int totalWT = 0;
	for (int i = 1; i < n; i++) {
		wt[i] = wt[i - 1] + processes[i - 1].burstTime;
		totalWT += wt[i];
	}

	int totalTAT = 0;
	for (int i = 0; i < n; i++) {
		tat[i] = processes[i].burstTime + wt[i];
		totalTAT += tat[i];
	}

	// Step 5: Display results
	System.out.println("\nProcess\tBurst Time\tWaiting Time\tTurnaround Time");
	System.out.println("-------------------------------------------------------------");

	for (int i = 0; i < n; i++) {
		System.out.println("P" + processes[i].id + "\t\t" +
		processes[i].burstTime + "\t\t" +
		wt[i] + "\t\t" +
		tat[i]);
	}
	System.out.println("-------------------------------------------------------------");

	// Step 6: Display total and average times
	System.out.println("Total Waiting Time: " + totalWT);
	System.out.printf("Average Waiting Time: %.2f\n", (float) totalWT / n);
	System.out.println("Total Turnaround Time: " + totalTAT);
	System.out.printf("Average Turnaround Time: %.2f\n", (float) totalTAT / n);
  

	// Close scanner
		scanner.close();
	}
}