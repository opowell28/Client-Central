public class Patient {

    String username;
    String email;
    String password;
    String name;
    String dateOfBirth;
    int age;
    double height;
    double weight;
    boolean currentPatient;
    String familyHistory;

    /**
     * Default constructor for Patient.java
     */
    public Patient() {
        this.username = null;
        this.email = null;
        this.password = null;
        this.name = null;
        this.dateOfBirth = null;
        this.age = 0;
        this.height = 0;
        this.weight = 0;
        this.currentPatient = false;
        this.familyHistory = null;
    }

    /**
     * Parameterized constructor for Patient.java
     * @param username username for login: String
     * @param email email for login: String
     * @param password password for login: String
     * @param name full name: String
     * @param dateOfBirth date of birth: String
     * @param age age: integer
     * @param height height in inches: double
     * @param weight weight in pounds: double
     * @param currentPatient whether or not the patient is current with this doctor's office: boolean
     * @param familyHistory any important details regarding health history in the family: String
     */
    public Patient(String username, String email, String password, String name, String dateOfBirth, int age,
                   double height, double weight, boolean currentPatient, String familyHistory) {
        this.username = username;
        this.email = email;
        this.password = password;
        this.name = name;
        this.dateOfBirth = dateOfBirth;
        this.age = age;
        this.height = height;
        this.weight = weight;
        this.currentPatient = currentPatient;
        this.familyHistory = familyHistory;
    }

    public void registerNewPatient() {
        //TODO: implement this function
    }
}
