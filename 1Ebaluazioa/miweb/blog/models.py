from django.db import models

# Create your models here.

class Post(models.Model):
    izenburua = models.CharField(max_length=100)
    edukia = models.CharField(max_length=300)
    noizsSortua = models.DateTimeField(auto_now_add=True)

    def __unicode__(self):
        return self.izenburua