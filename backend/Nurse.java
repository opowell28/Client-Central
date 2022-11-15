public class Nurse {
    String username;
    String email;
    String password;
    String name;
    String dateOfBirth;
    int age;

    /**
     * Default constructor for Nurse.java
     */
    public Nurse() {
        this.username = null;
        this.email = null;
        this.password = null;
        this.name = null;
        this.dateOfBirth = null;
        this.age = 0;
    }

    /**
     * Parameterized constructor for Nurse.java
     * @param username username for login: String
     * @param email email for login: String
     * @param password password for login: String
     * @param name full name: String
     * @param dateOfBirth date of birth: String
     * @param age age: integer
     */
    public Nurse(String username, String email, String password, String name, String dateOfBirth, int age) {
        this.username = username;
        this.email = email;
        this.password = password;
        this.name = name;
        this.dateOfBirth = dateOfBirth;
        this.age = age;
    }
}
