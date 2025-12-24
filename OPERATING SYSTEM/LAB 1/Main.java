import java.util.Scanner;

class Process {
    int pid;       // Process ID
    int at;        // Arrival time
    int bt;        // Burst time
    int rt;        // Remaining time
    int wt;        // Waiting time
    int tat;       // Turnaround time
}

public class Main {
    public static void main(String[] args) {

        Scanner scanner = new Scanner(System.in);

        System.out.println("Enter the number of processes: ");
        int n = scanner.nextInt();

        Process[] processes = new Process[n];

        // Initialize processes with IDs
        for (int i = 0; i < n; i++) {
            processes[i] = new Process();
            processes[i].pid = i + 1;
        }

        // Input arrival times
        System.out.println("Enter the arrival time for each process: ");
        for (int i = 0; i < n; i++) {
            System.out.print("P" + (i + 1) + " Arrival Time: ");
            processes[i].at = scanner.nextInt();
        }

        // Input burst times
        System.out.println("Enter the burst time for each process: ");
        for (int i = 0; i < n; i++) {
            System.out.print("P" + (i + 1) + " Burst Time: ");
            processes[i].bt = scanner.nextInt();
            processes[i].rt = processes[i].bt; // Initialize remaining time
        }

        // Time quantum
        System.out.println("Enter the time quantum: ");
        int quantum = scanner.nextInt();

        int t = 0;                // Current time
        boolean done;
        int totalWT = 0;
        int totalTAT = 0;

        // Round Robin Scheduling
        do {
            done = true;

            for (int i = 0; i < n; i++) {

                if (processes[i].rt > 0) {
                    done = false;

                    if (processes[i].rt > quantum) {
                        t += quantum;
                        processes[i].rt -= quantum;
                    } else {
                        t += processes[i].rt;
                        processes[i].wt = t - processes[i].bt - processes[i].at;
                        processes[i].rt = 0;
                    }
                }
            }

        } while (!done);

        // Calculate Turnaround Times
        for (int i = 0; i < n; i++) {
            processes[i].tat = processes[i].bt + processes[i].wt;
            totalWT += processes[i].wt;
            totalTAT += processes[i].tat;
        }

        // Output Table
        System.out.println("--------------------------------------------------------------");
        System.out.printf("| %-8s | %-12s | %-10s | %-12s | %-16s |\n",
                "Process", "Arrival Time", "Burst Time", "Waiting Time", "Turnaround Time");
        System.out.println("--------------------------------------------------------------");

        for (Process p : processes) {
            System.out.printf("| %-8d | %-12d | %-10d | %-12d | %-16d |\n",
                    p.pid, p.at, p.bt, p.wt, p.tat);
        }

        System.out.println("--------------------------------------------------------------");
        System.out.printf("Average waiting time = %.2f\n", (float) totalWT / n);
        System.out.printf("Average turnaround time = %.2f\n", (float) totalTAT / n);

        scanner.close();
    }
}