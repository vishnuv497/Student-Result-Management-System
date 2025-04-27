import streamlit as st
import mysql.connector

# Connect to MySQL database
conn = mysql.connector.connect(
    host="localhost",
    user="root",       # default XAMPP username
    password="",       # default XAMPP password is empty
    database="srm"
)
c = conn.cursor()

# Streamlit UI
st.title("Student Result Management System")

name = st.text_input("Student Name")
roll = st.text_input("Roll Number")
course = st.text_input("Course")

if st.button("Submit"):
    sql = "INSERT INTO students (name, roll, course) VALUES (%s, %s, %s)"
    val = (name, roll, course)
    c.execute(sql, val)
    conn.commit()
    st.success("Student record added successfully!")

conn.close()

