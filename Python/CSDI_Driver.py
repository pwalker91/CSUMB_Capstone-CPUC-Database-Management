import sys
from CSDI_MySQL import CSDI_MySQL as db#talk to them
from CSDI_matplotlib_adv.py import CSDI_MPL as mpl

"""grabbed this from your query page:
    "{"form_ttype":"TCP","form_ttype_tcp_vals":"throughput","form_ttype_udp_vals":"","form_ttype_png_vals":"","form_date":"2015-01-23","form_date_comparator":"<=","form_stats":"median","form_submit":""}"
    for form_ttype is that the table that I will be querying? if not, what table am I grabbing from.
    does throughput mean speed? that sounds kinda stupid but just making sure
    """
#is it possible to write the select statement as a string? and feed the string to CSDI_MySQL?
myDict = {'table':'test', 'type': 'TCP', 'date': 'somedate', 'operator': '>=', 'statistics': 'mean'}
math = ""
query = ""
print (myDict)

def getData(myDict):
    for data in myDict:
        #make values from myDict into the form where I can do results = db.select(information from my dict)
        #can i make it all one string and place it into select?
        #cause I want to do it kinda like how we did for select where we initiated query and added to it...
        #........
        #this is for the type of statistics they want
        #if they want a specific type, I can include that into the graphing functions and do another if/else to determine which type of graph they want.
        #i know most of this is wrong too.....
        #looked online to find a way to just take values out of dictionaries and convert it to a string
        query.join('{},'.format(val) for key, val in myDict.items())
        if (data == 'mean'):
            math = 'mean'
        if (data == 'median'):
            math = 'median'
        if (data == 'max'):
            math = 'max'
        print (math)
    #print (query)
    results = db.select("""information from myDict""")
    graphData(results)
def graphData(data):
    mpl.lineGraph(data,math)
    mpl.barGraph(data,math)
    #right? ^^^^?
