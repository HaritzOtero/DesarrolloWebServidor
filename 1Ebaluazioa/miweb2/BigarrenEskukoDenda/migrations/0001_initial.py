# Generated by Django 4.2.5 on 2023-09-26 06:13

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Author',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('izena', models.CharField(max_length=100)),
                ('abizena', models.CharField(max_length=100)),
                ('jaiotzaData', models.DateField(blank=True)),
                ('gmail', models.EmailField(max_length=100)),
            ],
        ),
        migrations.CreateModel(
            name='Post',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('jokoIzena', models.CharField(max_length=100)),
                ('deskripzioa', models.CharField(max_length=300)),
                ('prezioa', models.DateTimeField(auto_now_add=True)),
                ('author', models.CharField(max_length=300)),
            ],
        ),
    ]
