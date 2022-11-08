package com.externship.appointment.Appointment_storage;

import javax.persistence.Entity;
import javax.persistence.Id;

import org.springframework.stereotype.Component;
//appointment data table
@Component
@Entity
public class Appointment {
	@Id
	private String appId;
	private String email;
	private String docId;
	private String docName;
	private String docSpecial;
	private String status;
	private String date;
	private String slot;
	private String DOB;
	private String symptoms;
	private String phone;

	private String name;
	// Doctor ID	Doctor's Name	Specialization	Appointment Time	Appointment Date	Status
	public String getEmail() {
		return email;
	}
	public void setEmail(String email) {
		this.email = email;
	}
	public String getDocId() {
		return docId;
	}
	public void setDocId(String docId) {
		this.docId = docId;
	}
	public String getDate() {
		return date;
	}
	public void setDate(String date) {
		this.date = date;
	}
	public String getSlot() {
		return slot;
	}
	public void setSlot(String slot) {
		this.slot = slot;
	}
	public String getName() {
		return name;
	}
	public void setName(String name) {
		this.name = name;
	}
	public String getDOB() {
		return DOB;
	}
	public void setDOB(String DOB) {
		this.DOB = DOB;
	}
	public String getPhone() {
		return phone;
	}
	public void setPhone(String phone) {
		this.phone = phone;
	}
	public String getSymptoms() {
		return symptoms;
	}
	public void setSymptoms(String symptoms) {
		this.symptoms = symptoms;
	}

	public String getAppId() {
		return appId;
	}
	public void setAppId(int count) {
		this.appId = Integer.toString(count);
	}
	public String getDocName() {
		return docName;
	}
	public void setDocName(String docName) {
		this.docName = docName;
	}
	public String getDocSpecial() {
		return docSpecial;
	}
	public void setDocSpecial(String docSpecial) {
		this.docSpecial = docSpecial;
	}
	public String getStatus() {
		return status;
	}
	public void setStatus(String status) {
		this.status = status;
	}



}
