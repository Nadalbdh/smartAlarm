from flask import Flask
from flask_restful import Resource, Api, reqparse
import pandas as pd
import ast
app = Flask(__name__)
api = Api(app)

class SleepData(Resource):
    def get(self):
        data = pd.read_csv('data.csv')  # read CSV
        data = data.to_dict()  # convert dataframe to dictionary
        return {'data': data}, 200  # return data and 200 OK code    pass

    def post(self):
        parser = reqparse.RequestParser()  # initialize
    
        parser.add_argument('night', required=True)
        parser.add_argument('date', required=True)    
        parser.add_argument('hour', required=True) 
        parser.add_argument('motion', required=True)
        parser.add_argument('temperature', required=True)
        
        args = parser.parse_args() 
        
        # create new dataframe containing new values
        new_data = pd.DataFrame({
            'night': args['night'],
            'date': args['date'],
            'hour': args['hour'],
            'motion': args['motion'],
            'temperature': args['temperature']
        })
        data = pd.read_csv('data.csv')
        data = data.append(new_data, ignore_index=True)
        data.to_csv('data.csv', index=False)
        return {'data': data.to_dict()}, 200  # return data with 200 OK

api.add_resource(SleepData, '/sleepdata')  

if __name__ == '__main__':
    app.run(debug=True)  #run our Flask app