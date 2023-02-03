from pydantic import BaseModel
import datetime



# create a user device classes
class Device(BaseModel):
    version: float
    platform: str
    create_time: datetime.time | None = None