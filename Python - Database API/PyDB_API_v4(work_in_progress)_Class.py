import pymysql
###this works just as well as import mysql.connector
#For this i am assuming that this script will be called?
#or is it being ran from main?
#nick has questions about variables lastResult and lastQuery and functions connect() and config (param, param)
class CSDI_MySQL():

    lastResult = False
    lastQuery = “”

    config ={}
    
    def __init__(self):
	#defines config data
	#does this need to be user input?
        config = {}
		config["user"] = “Moradster”
    	config["host"] = “localhost”
    	config["password"] = “root”
    	config["database"] = “testdb”
    	config["autocommit"] = True
	
   def connect(self):
   		try:
   			connect = pymysql.connect(**config)
    		self.cursor = connect.cursor()
    		print ("Connection succeeded")
    		return True
    	except pymysql.Error as err:
    		print (err)
                
    def config(self, configDictionary, **kwargs):
    	
    
    #gets columns to compare
    def __getcolumns(self, table):
        self.cursor.execute("SELECT * FROM %s" %table)
        #used to grab column data
        list = self.cursor.description
        #returns the first item (column name) in each tuple
        return [getcolm[0] for getcolm in list]
    
    def __executeQuery(**kwargs):
    	try:
    		self.cursor.execute(kwargs)
            vtr = cursor.fetchall()
    		return (True, vtr)
    	except pymysql.Error as err:
    		print (err)
            return False

    def insert(self, table, **kwargs):
        #works for insert purposes
        #need to make a delete function incase of user mistakes
        #make for loop for column checks
        self.cursor.execute("SELECT * FROM %s" %table)
        if (query == lastQuery):
        	print(LA
        query = "INSERT INTO " + table + " ("
        for key in kwargs:
            query += "" + key + ","
        query = query[:-1]+" ) VALUES ("
        for key in kwargs:
            query += " %(" + key + ")s,"
        query = query[:-1]+")"
        print (query)
        print (kwargs)
        try:
            self.cursor.execute(query, kwargs)
        except pymysql.Error as err:
            print (err)

    def select(self, table, valuesToReturn, *args, **kwargs):
        #need to find a way to find if user input has wrong columns 
        query ="SELECT "
        for keys in args:
            query += "" + keys + ","
        query = query[:-1] + " FROM " + table + " WHERE "
        for keys in kwargs:
            query +="" + keys + "=%(" + keys + ")s,"
        query = query[:-1]+ ""
        print (query)
        try:
            self.cursor.execute(query, kwargs)
        except pymysql.Error as err:
            print (err)
        for item in cursor:
            print (item)

    """def update(self,table, *args, **kwargs):
        query = "UPDATE " + table + " SET "
        for key in args:
            query += "" + key + ","
        query = query[:-1]+" WHERE "
        for key in kwargs:
            query += "" + key + " =%("+ key + ")s,"
        query = query[:-1]
        print (query)
        try:
            self.cursor.execute(query, kwargs)
            for row in cursor:
                print (row)
        except pymysql.Error as err:
            print (err)"""

x = CSDI_MySQL()
userflag = True
while userflag==True:
    x.cursor.execute("SHOW TABLES")
    for items in x.cursor:
        print(items)
    print ("Please select a table to use")
    table = input('--> ')
    column names = __getColumns(table)
    print("Would you like to insert information or query table %s?" %table)
    command = input('[Insert/Select]')
    if (command == 'Insert' or command == 'insert'):
		print("Please insert data to be inserted:")
		insertData = input('—-> ')
		x.insert(insertData)
    if (command == 'Select' or command == 'select'):
    	print("insert: ['table', 'valuesToReturn', 'column = value'")
    	selData = input ('--> ')
		x.select(selData)
    else:
		break


