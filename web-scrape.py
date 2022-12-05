
# importing useful modules

import mysql.connector
from bs4 import BeautifulSoup
import requests


# establishing connection to mysql db

con = mysql.connector.connect(user="root", password=" ", database="scraping")

# creating the cursor to help us navigate the database

c = con.cursor()

# inserting the link to the local webpage in url variable

url = 'http://localhost/Hello/World%20Rankings%20_%20Men%20Overall%20Ranking.html'

# downloading the information from the web page

r = requests.get(url)

# checking the status of the file
# print(r.status_code)

# parsing the obtained information

soup = BeautifulSoup(r.text, 'html.parser')

# finding the actual table using its class

ranking_table = soup.find('table', class_='records-table')

# finding the actual path of the information

for athlete in ranking_table.find_all('tbody'):
    # looking into the inside of the variable athlete
    rows = athlete.find_all('tr')

    # checking again inside the rows
    for row in rows:
        rank = row.find('td').text.strip()
        athleteName = row.find_all('td')[1].text.strip()
        Dob = row.find_all('td')[2].text.strip()
        Nationality = row.find_all('td')[3].text.strip()
        score = row.find_all('td')[4].text.strip()
        competition = row.find_all('td')[5].text.strip()
        # print(rank, athleteName, Dob, Nationality, score, competition)

        # inserting information into the database

        c.execute('''INSERT INTO ranking_table VALUES(%s,%s,%s,%s,%s,%s)''',
                  (rank, athleteName, Dob, Nationality, score, competition))

        # data_athlete = (rank, athleteName, Dob, Nationality, score, competition)

        # cursor.execute(add_athlete)

# commiting the information to the db

con.commit()
c.close()
con.close()
