package com.externship.appointment;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import javax.servlet.http.HttpSession;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.servlet.ModelAndView;

import com.externship.appointment.Appointment_storage.AppointmentDelete;
import com.externship.appointment.Appointment_storage.Appointment;
import com.externship.appointment.Appointment_storage.AppointmentRepository;
import com.externship.appointment.Doctor_storage.Doctor;
import com.externship.appointment.Doctor_storage.DoctorRepository;
import com.externship.appointment.Patient_storage.Patient;
import com.externship.appointment.Patient_storage.PatientRepository;

@org.springframework.stereotype.Controller
public class Controller {
	
	int count=0;
	
	@Autowired
	PatientRepository patientRepo;
	
	@Autowired
	DoctorRepository docRepo;
	
	@Autowired
	AppointmentRepository appRepo;
	
	@GetMapping("/register")
	public String register() {
		return "register";
	}
	
	@GetMapping("/registerdoc")
	public String registerdoc() {
		return "registerdoc";
	}

	@GetMapping("/")
	public String home() {
		return "start";
	}

	@GetMapping("/patlog")
	public String patlog() {
		return "index";
	}

	@GetMapping("/doclog")
	public String doclog() {
		return "doclog";
	}
	
	@PostMapping("/registered")
	public String registered(Patient patient) {
		patientRepo.save(patient);
		return "redirect:/";
	}

	@PostMapping("/registereddoc")
	public String registereddoc(Doctor doctor) {
		docRepo.save(doctor);
		return "redirect:/";
	}
	
	@GetMapping("/fail_login")
	public String fail_login() {
		return "fail_login";
	}

	@PostMapping("/authenticate")
	public String authenticate(Patient patient, HttpSession session) {
		if(patientRepo.existsById(patient.getEmail()) && patientRepo.findById(patient.getEmail()).get().getPassword().equals(patient.getPassword())) {
			session.setAttribute("person", patient.getEmail());
			return "redirect:/home";
			}
		return "redirect:/fail_login";
	}

	@PostMapping("/authenticatedoc")
	public String authenticatedoc(Doctor doctor,HttpSession session) {
		if(docRepo.existsById(doctor.getEmail()) && docRepo.findById(doctor.getEmail()).get().getPassword().equals(doctor.getPassword())) {
			session.setAttribute("doctor", doctor.getEmail());
			return "redirect:/appointedDoc";
			}
		return "redirect:/fail_login";
	}
	
	@PostMapping("/cancel")
	public String cancel(AppointmentDelete dApp) {
		appRepo.deleteById(dApp.getAppId());
		return "redirect:/userdetails";
	}

	@GetMapping("/home")
	public ModelAndView display(HttpSession session) {
		ModelAndView mav= new ModelAndView("fail_login");
		String email = null;


		if(session.getAttribute("person")!=null) {
			mav = new ModelAndView("home");
			email = (String) session.getAttribute("person");
		}

		mav.addObject("email",email);

		return mav;


	}


	
	@PostMapping("/assignment")
	public String submitted(Appointment app) {
		app.setAppId(count++);
		app.setStatus("Active");
		appRepo.save(app);
		
//
		return "redirect:/patientlist";
	}
	
	@GetMapping("/patientList")
	public ModelAndView PatientList(HttpSession session) {
		
	    List<Patient> patient = new ArrayList<Patient>(); //use patient repo to display all patients on doctor's account
		patientRepo.findAll().forEach(patient::add);
	    Map<String, Object> params = new HashMap<>();
	    
	    params.put("patient", patient);
	    params.put("email", session.getAttribute("person")); //?
	    
	    return new ModelAndView("patientlist", params);
	}
	/* @GetMapping("/docdetails") //list doctors
	public ModelAndView DocDetails(HttpSession session) {

		List<Doctor> doctors = new ArrayList<Doctor>();
		docRepo.findAll().forEach(doctors::add);
		Map<String, Object> params = new HashMap<>();

		params.put("doctor", doctors);
		params.put("email", session.getAttribute("person"));

		return new ModelAndView("doclist", params);
	}
	*/

	@GetMapping("/userDetails")
	public ModelAndView UserDetails(HttpSession session) {
		List<Appointment> apps = appRepo.findAllByEmail(session.getAttribute("person").toString());
		Map<String,Object> params = new HashMap<>();
		
		params.put("appointments", apps);
		params.put("email", session.getAttribute("person"));
		
		return new ModelAndView("appointed",params);
		
	}

	@GetMapping("/booking")
	public ModelAndView Booking(HttpSession session) {
		List<Appointment> apps = appRepo.findAllByEmail(session.getAttribute("person").toString());
		Map<String,Object> params = new HashMap<>();

		params.put("appointments", apps);
		params.put("email", session.getAttribute("person"));

		return new ModelAndView("booking",params);

	}
	@GetMapping("/appointedDoc") //appointments scheduled
	public ModelAndView appointedDoc(HttpSession session) {
		List<Appointment> apps = appRepo.findByDocId(session.getAttribute("doctor").toString());
		Map<String,Object> params = new HashMap<>();
		
		params.put("appointments", apps);
		params.put("email", session.getAttribute("doctor"));
		
		return new ModelAndView("appointedDoc",params);
		
		
	}
	@PostMapping("/assign")//booking post
	public String assign(Appointment appoint) {
		appoint.setAppId(count++);
		appoint.setStatus("Active");
		appRepo.save(appoint);

//
		return "redirect:/userDetails";
	}


	
}
