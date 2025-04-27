from flask import Blueprint, render_template, request, redirect, url_for
from app.models import db, Student, Result

main = Blueprint('main', __name__)

@main.route('/')
def index():
    return render_template('index.html')

@main.route('/login')
def login():
    return render_template('login.html')

@main.route('/dashboard')
def dashboard():
    students = Student.query.all()
    return render_template('dashboard.html', students=students)

@main.route('/add-result', methods=['GET', 'POST'])
def add_result():
    if request.method == 'POST':
        student_id = request.form['student_id']
        subject = request.form['subject']
        marks = request.form['marks']

        new_result = Result(student_id=student_id, subject=subject, marks=marks)
        db.session.add(new_result)
        db.session.commit()

        return redirect(url_for('main.dashboard'))

    return render_template('add_result.html')

@main.route('/view-result/<int:student_id>')
def view_result(student_id):
    results = Result.query.filter_by(student_id=student_id).all()
    return render_template('view_result.html', results=results)
