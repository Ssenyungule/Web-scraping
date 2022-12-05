import mysql.connector

# establishing connection to mysql db

con = mysql.connector.connect(user="root", password=" ", database="scraping")

# creating the cursor to help us navigate the database

t = con.cursor()

# truncating the stored data

t.execute("TRUNCATE Table ranking_table;")
