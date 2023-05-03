import numpy as np
import cv2 as cv
import mysql.connector
import json
import time

# connect to mysql database
mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="bicyclegas"
)

# set max allow packet
mycursor = mydb.cursor()

cap = cv.VideoCapture(0)
frameNumber = 0
if not cap.isOpened():
    print("Cannot open camera")
    exit()
while True:
    # Capture frame-by-frame
    ret, frame = cap.read()
    # if frame is read correctly ret is True
    if not ret:
        print("Can't receive frame (stream end?). Exiting ...")
        break
    # Display the resulting frame
    frame = cv.cvtColor(frame, 2)

    # print("rgba:", frame)
    cv.imshow('frame', frame)
    print(len(frame.reshape(-1).tolist()))

    # convert frame to json

    jsonFrame = json.dumps(frame.reshape(-1).tolist())
    # print("json:", jsonFrame)

    # delete previous frame
    sql = "DELETE FROM webcam"
    mycursor.execute(sql)

    mydb.commit()

    # push data frame to database

    sql = "INSERT INTO webcam (frame_number, frame_matrix) VALUES (%s, %s)"
    val = (jsonFrame, frameNumber)
    mycursor.execute(sql, val)

    mydb.commit()

    print(mycursor.rowcount, "record inserted.")

    # update frame number
    frameNumber += 1
    # exit when press q
    if cv.waitKey(1) == ord('q'):
        break
    time.sleep(0.1)
# When everything done, release the capture
cap.release()
cv.destroyAllWindows()