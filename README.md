# COMP4970 - Software Engineering - Red Team

### Group Members:
|Team|Names|
|-|-|
|Client Front-end|Zeily Perez, Ian Marshal|
|Client Back-end|Jacob Hayes, Thomas Cox|
|Admin Front-end|Rachel Palmer, Crissy Leach, Alex Bodian|
|Admin Back-end|Ford Polia, Giles Holmes|
|Database|Tim Boss, Kevin Cotter, Brady Walsh, Emmett Basaca|

---

### [Documentation branch](https://github.com/MarshallMathers/SoftwareEngineering-Red/tree/documentation)
A branch that has all the course documentation submitted as a group and by teams.

---

### [Production branch](https://github.com/MarshallMathers/SoftwareEngineering-Red/tree/production)
Production is a prod-ready branch designed to get rid of the fluff of the master branch on github (I.E. database & Placeholders).

To launch to production:

```git branch -f production origin/production```

OR

```git clone -b production --single-branch https://github.com/MarshallMathers/SoftwareEngineering-Red.git```

Then just zip the repo and place it into any Apache/PHP webserver enabled host with a MySQL database.