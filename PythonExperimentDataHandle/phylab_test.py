import phylab
import unittest 

class test_phylab(unittest.TestCase):
	def testMin(self):
		self.assertEqual(phylab.BitAdapt(10,0.10),"(10.0\\pm0.1)","test bitadapt fail")
	def testDec(self):
		self.assertEqual(phylab.BitAdapt(3,1),"(3\\pm1)","test bitadapt fail")
	def testMax(self):
		self.assertEqual(phylab.BitAdapt(30000,10),"(3.000\\pm0.001){\\times}10^{4}","test bitadapt fail")

if __name__ =='__main__':
	unittest.main()