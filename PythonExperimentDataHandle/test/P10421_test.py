import P10421
import unittest 

class test_phylab(unittest.TestCase):
	def test(self):
		R1 = 100
		R2 = 100
		RN = pow(10,-3)
		LR = [[50,100,150,200,250,300,350,400],
        		[29.39,59.40,88.46,117.76,148.47,177.24,206.92,236.44],
        		[30.23,61.13,91.65,121.43,151.36,182.31,211.24,240.45]]
		d = [4.06,4.04,4.01,3.98,3.98,4.03,4.01,4.03]
		res = P10421.DoubleBridge(R1,R2,RN,LR,d)
		if((abs(res[0]-7.56*pow(10,-8))<0.01) & (abs(res[1]-0.04*pow(10,-8))<0.01)):
			x = 1
		else:
			x = 0
		self.assertEqual(x,1,"test DoubleBridge fail")

if __name__ =='__main__':
	unittest.main()
