from pydantic import BaseModel
import datetime



# create a user device class that stores user
# device information.
class Device(BaseModel):
    id: int | None = None
    version: float
    platform: str
    create_time: datetime.time | None = None