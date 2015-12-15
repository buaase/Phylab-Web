import phylab
import unittest 

class test_phylab(unittest.TestCase):
	def testMin(self):
		#print phylab.BitAdapt(10,0.10)
		self.assertEqual(phylab.BitAdapt(10,0.10),"(10.0\\pm0.1)","test bitadapt fail")
if __name__ =='__main__':
	unittest.main()