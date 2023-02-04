import redis



"""
make connection to redis database.
"""
def connect(host='localhost', port=6379, db=0):
    return redis.Redis(host=host, port=port, db=db)