// Write a program to sort a list of numbers that are accepted through 
// command line arguments.

class Sorting {
    public static void main(String args[]) {
        int i, j, num1, num2, n = args.length;
        String temp;
        for (i = 0; i < n - 1; i++) {
            for (j = 0; j < n - 1 - i; j++) {
                num1 = Integer.parseInt(args[j]);
                num2 = Integer.parseInt(args[j + 1]);
                if (num1 > num2) {
                    temp = args[j];
                    args[j] = args[j + 1];
                    args[j + 1] = temp;
                }
            }
        }
        System.out.println("The sorted list:");
        for (i = 0; i < n; i++) {
            System.out.print(args[i] + " ");
        }
    }
}
