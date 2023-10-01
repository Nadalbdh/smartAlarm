import datetime,  requests
from time import strftime
import bme280
from gpiozero import MotionSensor
import bme280 
import smbus2 
from time import sleep

URL = "http://127.0.0.1:5000/sleepdata"

port = 1 
address = 0x76 
bus = smbus2.SMBus(port) 
bme280_load_calibration_params(bus, address) 
pir = MotionSensor(4)
numMov = 0
def read_motion():
    while True: 
        pir.wait_for_motion()
        numMov = numMov + 1 
        return numMov
    

def read_temp(): 
    bme280_data = bme.sample(bus,address) 
    return bme280_data.temperature 

hour = format(strftime("%H"))
date = format(strftime("%x"))
night = "3"


data = { 
    'night': night,
    'date': date,
    'hour': hour,
    'motion': str(read_motion()),
    'temperature': str(read_temp())}

r = requests.post(URL, data)
numMov=0
print(r)
print(r.json())
