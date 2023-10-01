import csv
import random
import schedule
from time import sleep, strftime, time
import matplotlib.pyplot as plt
from datetime import date


plt.ion()
x = []
y = []

night = int(input("night n°: "))

with open('data.csv', 'a+') as csvfile:
        fieldnames = ['night','date','hour','motion','temperature']
        writer = csv.DictWriter(csvfile, fieldnames=fieldnames, lineterminator = '\n')
        writer.writeheader()
        csvfile.close()
        
def write_data(night,motion,temp):
    with open('data.csv', 'a+') as csvfile:
        fieldnames = ['night','date','hour','motion','temperature']
        writer = csv.DictWriter(csvfile, fieldnames=fieldnames, lineterminator = '\n')
        writer.writerow({'night': str(night), 'date': format(strftime("%x")), 'hour': format(strftime("%H")), 'motion': str(motion), 'temperature': str(temp) })

def graph(data):
    y.append(data)
    x.append(time())
    plt.clf()
    plt.scatter(x,y)
    plt.plot(x,y)
    plt.draw()

def job():
    motion=random.randint(0,14)
    temp=random.randint(35,39)
    write_data(night,motion,temp)
    graph(motion)
    graph(temp)
    

# start= input("start:")
hours_slept= int(input("hours: "))
schedule.every().second.do(job)

for i in range(hours_slept):
    schedule.run_pending()
    sleep(1)
