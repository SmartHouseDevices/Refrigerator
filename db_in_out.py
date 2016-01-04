#import RPi.GPIO as GPIO
import MySQLdb
import datetime

now = datetime.datetime.now()
#GPIO.setmode(GPIO.BCM)

db = MySQLdb.connect("localhost","root","pass","Refrigerator" )
cursor = db.cursor()
while 1:
#GPIO.setup(23, GPIO.IN, pull_up_down = GPIO.PUD_DOWN)

#GPIO.setup(24, GPIO.IN, pull_up_down = GPIO.PUD_UP)
	flag=0
	while flag==0:
	    flag=1
	    try:                                                                         #sou vazw try gia eksfalmatwsi
		code=int(raw_input('Reading the barcode... '))                               #code: i metavliti me to barcode pou tha pairnei apo to scanner
	    except ValueError:							         #se periptwsi pou to scanner kanei lathos sto encoding kai sou vgei kanena barcode:0df2033
		flag=0
		print('Problem while reading the code')



	query = "SELECT * from Items WHERE barcode = '%s'" % (code)
	rows=cursor.execute(query)
	if rows>0:
		query = "SELECT quantity from Items WHERE barcode = '%s'" % (code)
		cursor.execute(query)
		quantity = int(cursor.fetchone()[0])
	else:
		quantity = 0




	if rows==0:
		#den ine katoxiromeno sti vasi	
		desc=raw_input('Description: ')
		answer='add_new'
		print "Add new"
	elif rows>0 and quantity>0:
		#an to exoume dini epilogi

		#temp otan arxisoume anaptixi sto rpi 8a ine me button
		answer=raw_input('Would you like to add or to remove item? ')

	elif rows>0 and quantity==0:
		#den exoume
		answer='add'
	else:
		print "error"	
		#kati dn paei kala


	while answer!='add' and answer!='add_new' and answer!='remove':                                           #while (GPIO.input(23)!=1) and (GPIO.input(24)!=0):
	    answer=raw_input('Something went wrong. Would you like to add or to remove item?')
	if answer=='add_new':                                                                   #if (GPIO.input(23)==1):
		date = now.strftime('%Y-%m-%d %H:%M:%S')
		query = "INSERT INTO Items(barcode, \
		       name, quantity, insert_date) \
		       VALUES ('%d', '%s', '%d', '%s')" % \
		       (code, desc, 1, date)
		cursor.execute(query)
		print('Added')
	elif answer=='add':
		date = now.strftime('%Y-%m-%d %H:%M:%S')
		newquantity = quantity + 1
		query = "UPDATE Items SET quantity = '%d', insert_date = '%s' WHERE barcode = '%d'" % (newquantity, date, code)
		cursor.execute(query)
		print('Added')
		print newquantity
	elif answer=='remove':                                                              #elif (GPIO.input(24)==0):
		newquantity = quantity - 1
		query = "UPDATE Items SET quantity = '%d' WHERE barcode = '%d'" % (newquantity, code)
		cursor.execute(query)
		print('Removed')

	db.commit()



