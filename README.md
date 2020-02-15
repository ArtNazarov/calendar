# calendar

First, we **should** divide data and view. 

The calendar is 2d array, each row is correponds to index of week in month and each column
is corresponds to index of day in week. 

We must compute count of rows in our array using count of days in the giving month. 

After that, for each days in the month from 1 to count of days in selected month we should compute row and column of selected data (that look likes coordinates) and write something information to 2d matrix. In the example in the cell were placed dates but we can use requests to write intrested information from database to member of structure.

If we have 2d matrix with information in cells, we can push that as parameter for building view.
