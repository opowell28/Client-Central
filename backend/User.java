public interface User {

    // login attributes
    String username = null;
    String email = null;
    String password = null;

    // personal info attributes
    String name = null;
    String dateOfBirth = null;
    int age = 0;
    double height = 0;
    double weight = 0;
    boolean currentPatient = false;
    String familyHistory = null;

    // these can be uncommented once their respective types are created
    /*
    Provider currentProvider;
    Symptom symptoms;
    Allergy allergies;
     */

}
