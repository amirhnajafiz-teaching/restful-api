import fastapi
from fastapi import FastAPI
import datetime

from db import connect
from model import Device



# create list of devices
devices = []

# create an app instance
app = FastAPI()

# open redis connection
redis_connection = connect()

# setting base id
base_id = redis_connection.get('base')
if base_id == None:
    base_id = 10001


# create routes
"""
return the fastapi version.
"""
@app.get("/api")
def root():
    return {"Version": fastapi.__version__}


"""
return the list of device ids.
"""
@app.get("/api/device")
def get_devices():
    keys = redis_connection.get('keys')

    return [int(key) for key in str(keys).split('/')]


"""
add a new device to devices.
"""
@app.post("/api/device")
async def add_device(device: Device):
    global base_id

    device.id = base_id
    device.create_time = datetime.datetime.now()

    devices.append(device)

    base_id = base_id + 1

    return "OK"


"""
remove a device from devices.
"""
@app.delete("/api/device/{id}")
async def remove_device(id: int):
    item = None

    for device in devices:
        if device.id == id:
            item = device
            break

    if item == None:
        return "Not found"
    
    devices.remove(item)

    return "OK"


"""
update a device.
"""
@app.put("/api/device/{id}")
async def update_device(id: int, device: Device):
    item = None

    for device in devices:
        if device.id == id:
            item = device
            break

    if item == None:
        return "Not found"
    
    devices.remove(item)

    device.id = id
    devices.append(device)

    devices.sort(key=lambda x: x.id)

    return "OK"