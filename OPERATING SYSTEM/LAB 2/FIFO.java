import java.util.LinkedList;
import java.util.Queue;

public class FIFO {
	public static void main(String[] args) {
		int frames = 3; // Example number of frames
		
		// Predefined reference string
		int[] referenceString = {7, 0, 1, 2, 0, 3, 0, 4, 2, 3, 0, 3, 2, 1, 2, 0, 1, 7, 0, 1};
		
		Queue<Integer> pageQueue = new LinkedList<>();
		int hits = 0, misses = 0;
		
		// Process the reference string
		for (int i = 0; i < referenceString.length; i++) {
			if (pageQueue.contains(referenceString[i])) {
				hits++;
			} else {
				misses++;
				if (pageQueue.size() == frames) {
					pageQueue.poll(); // Remove the oldest page i.e from head/front
				}
				pageQueue.add(referenceString[i]); // Add the new page to the queue at the tail/rear
			}
			
			// Print only the current contents of the frames
			System.out.println("Frames: " + pageQueue);
		}
		
		// Output results at the end
		System.out.println("Hits: " + hits);
		System.out.println("Misses: " + misses);
		double hitRatio = (double) hits / referenceString.length;
		double missRatio = (double) misses / referenceString.length;
		System.out.println("Hit Ratio: " + hitRatio);
		System.out.println("Miss Ratio: " + missRatio);
	}
}