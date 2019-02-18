#!/usr/bin/python3 
import smtplib
from sys import argv, exit
from getopt import getopt
from email.mime.text import MIMEText
from email.header import Header
from email.utils import parseaddr, formataddr

sender = '=?utf-8?q?NCMUNC_Welcome?= <welcome@ncmunc.org>'
receivers = []

def send_email(message):
    smtpObj = smtplib.SMTP()
    print("Connecting to server...")
    print(smtpObj.connect("smtp.ym.163.com", 25))

    print("Logining...")
    print(smtpObj.login("welcome@ncmunc.org", "NBmun2019"))
    
    print("Sending...")
    smtpObj.sendmail(sender, receivers, message.as_string())
    print ("Success")

def format_email_addr(name, email):
    return formataddr((Header(name, "utf-8").encode(), email))

def help():
    help_msg = """\
Usage: {file} -n Name -e EMAIL

Options:
  -h, --help                show this help message and exit
  -n NAME, --name=NAME      send email to NAME
  -e EMAIL, --email=EMAIL   send email to EMAIL
  -f FILE, --file=FILE      send email with content of FILE

Examples:
  {file} -n Someone -e someone@example.com -f welcome.html
""".format(file=__file__)
    print(help_msg)
    exit(0)

def main(argv):
    name = email = filename = None
    opts, args = getopt(argv, "hn:e:f:", ["help", "name=", "email=", "file="])
    for opt, value in opts:
        if opt in ("-h", "--help"):
            help()
        if opt in ("-n", "--name"):
            name = value
        if opt in ("-e", "--email"):
            email = value
        if opt in ("-f", "--file"):
            filename = value

    if not name or not email or not filename:
        help()
    else:
        receivers.append(email)

    subject = 'Welcome to NCMUNC!'
    mail_msg = open(filename,'r').read()
    message = MIMEText(mail_msg, 'html', 'utf-8')
    message['From'] = Header(format_email_addr("NCMUNC Welcome", "welcome@ncmunc.org"), 'utf-8')
    message['To'] =  Header(format_email_addr(name, email), 'utf-8')
    message['Subject'] = Header(subject, 'utf-8')

    try:
        send_email(message)
    except smtplib.SMTPException as e:
        print ("** Error: ", e)


if __name__ == "__main__":
    main(argv[1:])
