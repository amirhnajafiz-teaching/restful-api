import fastapi
from fastapi import FastAPI
import datetime

from model import Device



# create list of devices
devices = []
base_id = 10001

# create an app instance
app = FastAPI()



# create api routes
"""
url: http://localhost:8000/api
input: none
return: the fastapi version
"""
@app.get("/api")
def root():
    return {"Version": fastapi.__version__}


"""
url: http://localhost:8000/api/device
input: none
return: the list of devices
"""
@app.get("/api/device")
def get_devices():
    return devices


"""
url: http://localhost:8000/api/device/{id}
input: id(int, required, device id), device(Device, required, device info)
description: add a new device to devices
return: "OK"
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
url: http://localhost:8000/api/device/{id}
input: id(int, required, device id)
description: remove a device from devices
return: "OK"
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
url: http://localhost:8000/api/device/{id}
input: id(int, required, device id), device(Device, required, device info)
description: update a device
return: "OK"
"""
@app.put("/api/device/{id}")
async def update_device(id: int, new_device: Device):
    item = None

    for device in devices:
        if device.id == id:
            item = device
            break

    if item == None:
        return "Not found"
    
    devices.remove(item)

    new_device.id = id
    devices.append(new_device)

    devices.sort(key=lambda x: x.id)

    return "OK"
